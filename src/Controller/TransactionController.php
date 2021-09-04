<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    #[Route('/transaction', name: 'app_transaction')]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('transaction/index.html.twig', [
            'user' => $user
        ]);
    }
}
