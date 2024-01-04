<?php

declare(strict_types=1);

namespace App\Infrastructure\Anime;

use App\Domain\Anime\Anime;
use App\Domain\Anime\AnimeNotFoundException;
use App\Domain\Anime\AnimeRepository;
use App\Infrastructure\Infrastructure;

class AnimeInfrastructure extends Infrastructure implements AnimeRepository
{
    /**
     * {@inheritDoc}
     */
    public function findByGenreId(int $genreId): array
    {
        $animes = $this->db->query(
            "SELECT * FROM animes WHERE genreId=? ORDER BY id DESC",
            [$genreId]
        );
        $result = [];
        foreach ($animes as $anime) {
            array_push($result, new Anime($anime));
        }
        return array_values($result);
    }

    /**
     * {@inheritDoc}
     */
    public function findOneByTitle(string $title): Anime
    {
        $anime = $this->db->query(
            "SELECT * FROM animes WHERE title=?",
            [$title]
        );
        if (count($anime) == 0) {
            throw new AnimeNotFoundException();
        }
        return new Anime($anime[0]);
    }
}