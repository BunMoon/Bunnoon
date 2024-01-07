<?php

declare(strict_types=1);

namespace App\Application\Controllers\Auth;

use App\Application\Controllers\AbstractController;
use App\Domain\User\UserRepository;
use App\Infrastructure\User\UserInfrastructure;
use Library\CSRF;

abstract class AbstractAuthController extends AbstractController
{
    protected CSRF $csrf;
    protected UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->csrf = new CSRF();
        $this->userRepository = new UserInfrastructure();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['request'])) {
            // Csrf validation
            if (!$this->csrf->verify($_POST['csrf_token'])) {
                echo 'Csrf validation was failed!';
                return;
            }
            $this->action();
        }
    }

    /**
     * Call this method function when user send form `POST` request and validations.
     */
    abstract protected function action(): void;

    protected function redirect(): void
    {
        $url = $_GET['continue'] ?? '/';
        header("Location: $url");
    }
}