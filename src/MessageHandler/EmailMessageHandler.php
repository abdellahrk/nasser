<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Repository\UserRepository;

final class EmailMessageHandler implements MessageHandlerInterface
{
    public function __construct(private UserRepository $userRepository)
    {
        
    }
    public function __invoke(EmailMessage $message)
    {
        $userId = $message->getUserId();

        $user = $this->userRepository->find($userId);

        $email = (new TemplatedEmail())
            ->from('no-reply@eastwest-financial.com')
            ->to($user->getEmail())
            ->subject('Pending Bank Transaction') // to do
            ->htmlTemplate('emails/new_transaction.twig')
            ->context([
                'user' => $user
            ])
        ;
    }
}
