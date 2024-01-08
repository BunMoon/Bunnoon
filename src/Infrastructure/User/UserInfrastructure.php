<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
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

    /**
     * {@inheritDoc}
     */
    public function findOneById(int $userId): User
    {
        $user = $this->db->query(
            "SELECT * FROM users WHERE id=?",
            [$userId]
        );
        if (count($user) == 0) {
            throw new UserNotFoundException();
        }
        return new User($user[0]);
    }

    /**
     * {@inheritDoc}
     */
    public function findOneByUsername(string $username): User
    {
        $user = $this->db->query(
            "SELECT * FROM users WHERE username=?",
            [strtolower($username)]
        );
        if (count($user) == 0) {
            throw new UserNotFoundException();
        }
        return new User($user[0]);
    }
}