<?php

declare(strict_types=1);

namespace App\Application\Controllers\Setting;

use App\Application\Controllers\AbstractController;
use App\Domain\User\UserRepository;
use App\Infrastructure\User\UserInfrastructure;
use Library\CSRF;

abstract class AbstractSettingController extends AbstractController
{
    protected CSRF $csrf;
    protected UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();

        // Client does not login
        if (!$this->authentication->isAuthenticated) {
            header('Location: /signin.php?continue=' . urlencode($_SERVER['REQUEST_URI']));
            return;
        }

        $this->csrf = new CSRF();
        $this->userRepository = new UserInfrastructure();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}