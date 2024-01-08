<?php

declare(strict_types=1);

namespace App\Infrastructure\Session;

use App\Domain\Session\SessionRepository;
use App\Infrastructure\Infrastructure;

class SessionInfrastructure extends Infrastructure implements SessionRepository
{
    /**
     * {@inheritDoc}
     */
    public function save(string $token, int $userId): void
    {
        $stamt = $this->db->pdo->prepare("INSERT INTO sessions (token, userId) VALUES (?, ?)");
        $stamt->execute([$token, $userId]);
    }
}