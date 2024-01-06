<?php

declare(strict_types=1);

namespace App\Domain\User;

class User
{
    public function __construct(private array $record)
    {
    }

    public function email(): string
    {
        return $this->record['email'];
    }

    public function username(): string
    {
        return $this->record['username'];
    }

    public function password(): string
    {
        return $this->record['password'];
    }

    public function name(): string
    {
        return $this->record['name'];
    }
}