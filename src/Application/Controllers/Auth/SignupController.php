<?php

declare(strict_types=1);

namespace App\Application\Controllers\Auth;

class SignupController extends AbstractAuthController
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
        $this->render('Signup.html', ['csrf_token' => $this->csrf->token]);
    }

    /**
     * {@inheritDoc}
     */
    protected function action(): void
    {
        $this->userRepository->save($_POST['email'], $_POST['username'], $_POST['password']);
        $this->redirect();
    }
}