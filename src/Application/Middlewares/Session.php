<?php

declare(strict_types=1);

namespace App\Application\Middlewares;

class Session
{
    public function __construct()
    {
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_strict_mode', 1);
        session_set_cookie_params([
            'lifetime' => 3600,
            'domain' => '',
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
        session_name('SSID');
    }

    public function regeneration()
    {
        if (!isset($_SESSION['last_regeneration'])) {
            session_regenerate_id(true);
            $_SESSION['last_regeneration'] = time();
        } else {
            $interval = 1800;
            if (time() - $_SESSION['last_regeneration'] > $interval) {
                session_regenerate_id(true);
                $_SESSION['last_regeneration'] = time();
            }
        }
    }
}