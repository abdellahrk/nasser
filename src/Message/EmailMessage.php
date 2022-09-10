<?php

namespace App\Message;

final class EmailMessage
{
    public function __construct(private int $userId)
    {
        
    }

    public function getUserId(): int 
    {
        return $this->userId;
    }
}
