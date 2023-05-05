<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetAllUsers()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        // Assurez-vous que nous obtenons un tableau
        $this->assertIsArray($users);

        // Assurez-vous que chaque utilisateur a un nom
        foreach ($users as $user) {
            $this->assertArrayHasKey('name', $user);
        }
    }
}
