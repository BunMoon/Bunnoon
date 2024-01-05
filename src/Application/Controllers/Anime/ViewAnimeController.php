<?php

declare(strict_types=1);

namespace App\Application\Controllers\Anime;

use App\Application\Controllers\AbstractController;
use App\Domain\Anime\AnimeNotFoundException;
use App\Domain\Anime\AnimeRepository;
use App\Domain\Episode\EpisodeRepository;
use App\Infrastructure\Anime\AnimeEpisodeInfrastructure;
use App\Infrastructure\Anime\AnimeInfrastructure;

class ViewAnimeController extends AbstractController
{
    private AnimeRepository $animeRepository;
    private EpisodeRepository $episodeRepository;

    public function __construct()
    {
        $this->animeRepository = new AnimeInfrastructure();
        $this->episodeRepository = new AnimeEpisodeInfrastructure();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        try {
            $anime = $this->animeRepository->findOneByTitle($_GET['id']);
            $episodes = $this->episodeRepository->findByAnimeId($anime->id());
            $this->render('ViewAnime.html', [
                'anime' => $anime,
                'episodes' => $episodes,
            ]);
        } catch (AnimeNotFoundException) {
            echo 'Anime does not exist.';
        }
    }
}