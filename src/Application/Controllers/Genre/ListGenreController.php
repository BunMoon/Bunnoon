<?php

declare(strict_types=1);

namespace App\Application\Controllers\Genre;

use App\Application\Controllers\AbstractController;
use App\Domain\Genre\GenreRepository;
use App\Infrastructure\Genre\GenreInfrastructure;

class ListGenreController extends AbstractController
{
    private GenreRepository $genreRepository;

    public function __construct()
    {
        $this->genreRepository = new GenreInfrastructure();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        $genres = $this->genreRepository->find();
        $this->render('ListGenre.html', [
            'genres' => $genres
        ]);
    }
}