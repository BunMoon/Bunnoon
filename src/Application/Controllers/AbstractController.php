<?php

declare(strict_types=1);

namespace App\Application\Controllers;

abstract class AbstractController
{
    public function __invoke()
    {
        $this->view();
    }

    abstract protected function view(): void;
}