<?php

declare(strict_types=1);

namespace App\Infrastructure\Session;

use App\Domain\Session\SessionRepository;
use App\Infrastructure\Infrastructure;

class SessionInfrastructure extends Infrastructure implements SessionRepository
{
}