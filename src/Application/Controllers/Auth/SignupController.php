<?php

declare(strict_types=1);

namespace App\Application\Controllers\Auth;

use App\Application\Controllers\AbstractController;

class SignupController extends AbstractController
{
    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        $this->render('Signup.html');
    }
}