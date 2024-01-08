<?php

declare(strict_types=1);

namespace Library;

use Ramsey\Uuid\Uuid;

class CSRF
{
    private string $SECRET_KEY = '';

    public string $token;

    public function __construct()
    {
        if (!isset($_COOKIE['CSRF_TOKEN'])) {
            $secret = Uuid::uuid4()->toString();
            setcookie('CSRF_TOKEN', $secret, [
                'expires' => time() + 31536000,
                'path' => '/',
                'domain' => '',
                'secure' => false,
                'httponly' => true,
                'samesite' => 'Strict',
            ]);
        } else {
            $secret = $_COOKIE['CSRF_TOKEN'];
        }

        $this->token = $this->hash($secret);
    }

    public function verify(string $token): bool
    {
        return $this->hash($_COOKIE['CSRF_TOKEN']) === $token;
    }

    private function hash(string $secret): string
    {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS, "$this->SECRET_KEY $secret")->toString();
    }
}