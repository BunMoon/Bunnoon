<?php

declare(strict_types=1);

namespace App\Application\Middlewares;

use App\Domain\User\User;
use Library\Strategy;

class Authentication extends Strategy
{
    public bool $isAuthenticated = false;

    public function __construct()
    {
    }

    public function authenticate(array $value, int $strategy = 0): bool
    {
        switch ($strategy) {
            case self::STRATEGY_PASSWORD:
                return $this->passwordStrategy($value[0], $value[1]);
            default:
                return false;
        }
    }

    public function login(User $user): void
    {
        echo 'Login successfully!';
    }
}