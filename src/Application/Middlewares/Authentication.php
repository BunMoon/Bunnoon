<?php

declare(strict_types=1);

namespace App\Application\Middlewares;

class Authentication
{
    public bool $isAuthenticated = false;

    public function __construct()
    {
    }
}