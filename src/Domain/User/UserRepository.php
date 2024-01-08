<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * Create user record.
     */
    public function save(string $email, string $username, string $password): void;

    /**
     * Find one user record by primary key.
     * 
     * @return User
     * @throws UserNotFoundException
     */
    public function findOneById(int $userId): User;

    /**
     * Find one user record by username.
     * 
     * @return User
     * @throws UserNotFoundException
     */
    public function findOneByUsername(string $username): User;
}