<?php

declare(strict_types=1);

namespace App\Infrastructure\Session;

use App\Domain\Session\Session;
use App\Domain\Session\SessionNotFoundException;
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

    /**
     * {@inheritDoc}
     */
    public function findOneByToken(string $token): Session
    {
        $session = $this->db->query(
            "SELECT * FROM sessions WHERE deletedAt IS NULL AND token=?",
            [$token]
        );
        if (count($session) == 0) {
            throw new SessionNotFoundException();
        }
        return new Session($session[0]);
    }
}