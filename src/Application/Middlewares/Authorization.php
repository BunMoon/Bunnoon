<?php

declare(strict_types=1);

namespace App\Application\Middlewares;

use App\Domain\User\User;

class Authorization
{
    public User $user;

    public function __construct()
    {
        $this->user = new User([]);
    }
}