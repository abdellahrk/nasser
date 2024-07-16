<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminController extends AbstractController
{
    #[Route('/configure-admin', name: 'admin')]
    public function index(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    {
        $admin = new User();
        
        $admin->setEmail('admin@nasser.build');
        $admin->setUsername('bonjour');
        $admin->setRoles(["ROLE_ADMIN", "ROLE_USER"]);
        $admin->setPassword(
            $passwordHasher->hashPassword($admin, 'bonjour1')
        );

        $em->persist($admin);
        $em->flush();
        
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
