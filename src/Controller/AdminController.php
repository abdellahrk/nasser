<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminController extends AbstractController
{
    #[Route('/configure-admin', name: 'admin')]
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        $admin = new User();
        
        $admin->setEmail('admin@internationbasisbank.com');
        $admin->setUsername('nasser-admin');
        $admin->setRoles(["ROLE_ADMIN", "ROLE_USER"]);
        $admin->setPassword(
            $passwordHasher->hashPassword($admin, 'bonjour1')
        );

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($admin);

        $entityManager->flush();
        
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
