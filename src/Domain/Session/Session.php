<?php

declare(strict_types=1);

namespace App\Domain\Session;

class Session
{
    public function __construct(private array $record)
    {
    }

    public function token(): string
    {
        return $this->record['token'];
    }

    public function userId(): int
    {
        return $this->record['userId'];
    }
}