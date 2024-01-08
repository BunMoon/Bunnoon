<?php

declare(strict_types=1);

namespace App\Domain\Session;

interface SessionRepository
{
    /**
     * Create session record.
     */
    public function save(string $token, int $userId): void;

    /**
     * Find one session record by token.
     * 
     * @return Session
     * @throws SessionNotFoundException
     */
    public function findOneByToken(string $token): Session;
}