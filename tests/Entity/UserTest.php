<?php 

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{ 
    public function testCreateUser()
    {
        $user = new User();

        $user->setUsername('Ramadan');

        $fullname = $user->getUsername();

        $this->assertSame('Ramadan', $fullname);

    }
}