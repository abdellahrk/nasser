<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Profile;
use App\Form\ProfileType;
use App\Service\SlugText;
use App\Repository\UserRepository;
use App\Repository\ProfileRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @IsGranted("ROLE_ADMIN")
 */
#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'user_index', methods: ['GET'])]
    public function index(ProfileRepository $profileRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $profileRepository->findAll();

        $users = $paginator->paginate(
            $query, 
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('user/index.html.twig', [
            'profiles' => $users,
        ]);
    }

    #[Route('/new', name: 'user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserPasswordHasherInterface $passwordHasher, SlugText $slugger): Response
    {
        $user = new User();
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setUsername($form->get('username')->getData());
            if($form->get('email') !== NULL) { 
                $user->setEmail($form->get('email')->getData());
            }
            $user->setPassword(
                $passwordHasher->hashPassword($user, 'bonjour1')
            );

            $user->setRoles(["ROLE_CUSTOMER", "ROLE_USER"]);

            $profile->setSlug($slugger->makeSlug($form->get('fullname')->getData()));
            $profile->setUser($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->persist($profile);
            $entityManager->flush();

            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'profile' => $profile,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'user_show', methods: ['GET'])]
    public function show(Profile $profile): Response
    {
        return $this->render('user/show.html.twig', [
            'profile' => $profile,
        ]);
    }

    #[Route('/{slug}/edit', name: 'user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Profile $profile): Response
    {
        $form = $this->createForm(ProfileType::class, $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'profile' => $profile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'user_delete', methods: ['POST'])]
    public function delete(Request $request, Profile $profile): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profile->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($profile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
    }
}
