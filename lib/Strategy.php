<?php

declare(strict_types=1);

namespace Library;

class Strategy
{
    const STRATEGY_DEFAULT = 0;

    protected function defaultStrategy(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}