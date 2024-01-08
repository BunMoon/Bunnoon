<?php

declare(strict_types=1);

namespace App\Domain\Session;

interface SessionRepository
{
    /**
     * Create session record.
     */
    public function save(string $token, int $userId): void;
}