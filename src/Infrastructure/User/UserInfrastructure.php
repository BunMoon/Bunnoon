<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\User\UserRepository;
use App\Infrastructure\Infrastructure;

class UserInfrastructure extends Infrastructure implements UserRepository
{
}