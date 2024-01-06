<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\User\UserRepository;
use App\Infrastructure\Infrastructure;

class UserInfrastructure extends Infrastructure implements UserRepository
{
    /**
     * {@inheritDoc}
     */
    public function save(string $email, string $username, string $password): void
    {
        $stamt = $this->db->pdo->prepare("INSERT INTO users (email, username, password, name) VALUES (?, ?, ?, ?)");
        $stamt->execute([
            $email,
            strtolower($username),
            password_hash($password, PASSWORD_ARGON2ID),
            $username,
        ]);
    }
}