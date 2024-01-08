<?php

declare(strict_types=1);

namespace App\Application\Middlewares;

use App\Domain\Session\SessionRepository;
use App\Domain\User\User;
use App\Infrastructure\Session\SessionInfrastructure;
use Library\Strategy;
use Utilities\Random;

class Authentication extends Strategy
{
    public bool $isAuthenticated = false;

    private SessionRepository $sessionRepository;

    public function __construct()
    {
        $this->sessionRepository = new SessionInfrastructure();
        if (isset($_COOKIE['LOGIN_INFO'])) {
            $this->isAuthenticated = true;
        }
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
        $token = Random::uniqid();
        $this->sessionRepository->save($token, $user->id());
        setcookie('LOGIN_INFO', $token, [
            'expires' => time() + 31536000,
            'path' => '/',
            'domain' => '',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
        echo 'Login successfully!';
    }
}