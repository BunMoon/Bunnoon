<?php

declare(strict_types=1);

namespace App\Application\Controllers\Auth;

use App\Application\Controllers\AbstractController;
use App\Domain\User\UserRepository;
use App\Infrastructure\User\UserInfrastructure;

class SignupController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserInfrastructure();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        if (isset($_POST['request'])) {
            $this->userRepository->save($_POST['email'], $_POST['username'], $_POST['password']);
            $this->redirect();
            return;
        }
        $this->render('Signup.html');
    }

    private function redirect(): void
    {
        $url = $_GET['continue'] ?? '/';
        header("Location: $url");
    }
}