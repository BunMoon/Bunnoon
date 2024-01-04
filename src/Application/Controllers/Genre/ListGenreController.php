<?php

declare(strict_types=1);

namespace App\Application\Controllers\Genre;

use App\Application\Controllers\AbstractController;

class ListGenreController extends AbstractController
{
    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        $this->render('ListGenre.html');
    }
}