<?php

declare(strict_types=1);

namespace App\Application\Controllers\Anime;

use App\Application\Controllers\AbstractController;
use App\Domain\Anime\AnimeNotFoundException;
use App\Domain\Anime\AnimeRepository;
use App\Infrastructure\Anime\AnimeInfrastructure;

class ViewAnimeController extends AbstractController
{
    private AnimeRepository $animeRepository;

    public function __construct()
    {
        $this->animeRepository = new AnimeInfrastructure();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        try {
            $anime = $this->animeRepository->findOneByTitle($_GET['id']);
            $this->render('ViewAnime.html', [
                'anime' => $anime,
            ]);
        } catch (AnimeNotFoundException) {
            echo 'Anime does not exist.';
        }
    }
}