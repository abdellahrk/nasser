<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted("ROLE_CUSTOMER")]
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
