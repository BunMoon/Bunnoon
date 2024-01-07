<?php

declare(strict_types=1);

namespace App\Application\Controllers\Auth;

use App\Domain\User\UserNotFoundException;

class SigninController extends AbstractAuthController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        $this->render('Signin.html');
    }

    /**
     * {@inheritDoc}
     */
    protected function action(): void
    {
        try {
            $user = $this->userRepository->findOneByUsername($_POST['username']);
            if ($this->authentication->authenticate([$_POST['password'], $user->password()])) {
                $this->authentication->login($user);
                $this->redirect();
                return;
            } else {
                echo 'Password was incorrect.';
            }
        } catch (UserNotFoundException) {
            echo 'User does not exist.';
        }
    }
}