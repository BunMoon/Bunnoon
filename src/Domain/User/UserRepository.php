<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * Create user record.
     */
    public function save(string $email, string $username, string $password): void;
}