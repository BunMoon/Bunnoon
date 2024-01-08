<?php

declare(strict_types=1);

namespace Library;

class Strategy
{
    const STRATEGY_PASSWORD = 0;

    protected function passwordStrategy(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}