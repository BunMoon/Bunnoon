<?php

declare(strict_types=1);

namespace App\Application\Middlewares;

use App\Domain\Session\SessionNotFoundException;
use App\Domain\Session\SessionRepository;
use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use App\Infrastructure\Session\SessionInfrastructure;
use App\Infrastructure\User\UserInfrastructure;

class Authorization
{
    public User|null $user = null;

    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->sessionRepository = new SessionInfrastructure();
        $this->userRepository = new UserInfrastructure();
    }

    public function searchUserSession()
    {
        try {
            $session = $this->sessionRepository->findOneByToken($_COOKIE['LOGIN_INFO']);
            $user = $this->userRepository->findOneById($session->userId());
            $this->user = $user;
        } catch (SessionNotFoundException) {
            echo 'Session does not exist.';
        } catch (UserNotFoundException) {
            echo 'User does not exist.';
        }
    }
}