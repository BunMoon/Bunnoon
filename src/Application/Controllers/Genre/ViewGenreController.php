<?php

declare(strict_types=1);

namespace App\Application\Controllers\Genre;

use App\Application\Controllers\AbstractController;
use App\Domain\Anime\AnimeRepository;
use App\Domain\Genre\GenreNotFoundException;
use App\Domain\Genre\GenreRepository;
use App\Infrastructure\Anime\AnimeInfrastructure;
use App\Infrastructure\Genre\GenreInfrastructure;

class ViewGenreController extends AbstractController
{
    private GenreRepository $genreRepository;
    private AnimeRepository $animeRepository;

    public function __construct()
    {
        $this->genreRepository = new GenreInfrastructure();
        $this->animeRepository = new AnimeInfrastructure();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        try {
            $genre = $this->genreRepository->findOneByTitle($_GET['id']);
            $animes = $this->animeRepository->findByGenreId($genre->id());
            $this->render('ViewGenre.html', [
                'genre' => $genre,
                'animes' => $animes,
            ]);
        } catch (GenreNotFoundException) {
            echo 'Genre does not exist.';
        }
    }
}