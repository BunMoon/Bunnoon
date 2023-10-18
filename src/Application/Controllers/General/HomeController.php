<?php

declare(strict_types=1);

namespace App\Application\Controllers\General;

use App\Application\Controllers\AbstractController;

class HomeController extends AbstractController
{
    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        $this->render("Home.html");
    }
}