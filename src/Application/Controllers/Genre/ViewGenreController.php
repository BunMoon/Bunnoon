<?php

declare(strict_types=1);

namespace App\Application\Controllers\Genre;

use App\Application\Controllers\AbstractController;
use App\Domain\Genre\GenreNotFoundException;
use App\Domain\Genre\GenreRepository;
use App\Infrastructure\Genre\GenreInfrastructure;

class ViewGenreController extends AbstractController
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
        try {
            $genre = $this->genreRepository->findOneByTitle($_GET['id']);
            $this->render('ViewGenre.html', [
                'genre' => $genre,
            ]);
        } catch (GenreNotFoundException) {
            echo 'Genre does not exist.';
        }
    }
}