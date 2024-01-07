<?php

declare(strict_types=1);

namespace App\Application\Controllers\Auth;

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
        print_r($_POST);
    }
}