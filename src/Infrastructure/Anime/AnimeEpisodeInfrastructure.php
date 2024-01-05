<?php

declare(strict_types=1);

namespace App\Infrastructure\Anime;

use App\Domain\Episode\Episode;
use App\Domain\Episode\EpisodeRepository;
use App\Infrastructure\Infrastructure;

class AnimeEpisodeInfrastructure extends Infrastructure implements EpisodeRepository
{
    /**
     * {@inheritDoc}
     */
    public function findByAnimeId(int $animeId): array
    {
        $episodes = $this->db->query(
            "SELECT * FROM anime_episodes WHERE animeId=?",
            [$animeId]
        );
        $result = [];
        foreach ($episodes as $episode) {
            array_push($result, new Episode($episode));
        }
        return array_values($result);
    }
}