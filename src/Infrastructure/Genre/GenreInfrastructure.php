<?php

declare(strict_types=1);

namespace App\Infrastructure\Genre;

use App\Domain\Genre\Genre;
use App\Domain\Genre\GenreNotFoundException;
use App\Domain\Genre\GenreRepository;
use App\Infrastructure\Infrastructure;

class GenreInfrastructure extends Infrastructure implements GenreRepository
{
    /**
     * {@inheritDoc}
     */
    public function find(): array
    {
        $genres = $this->db->query("SELECT * FROM genres");
        $result = [];
        foreach ($genres as $genre) {
            array_push($result, new Genre($genre));
        }
        return array_values($result);
    }

    /**
     * {@inheritDoc}
     */
    public function findOneByTitle(string $title): Genre
    {
        $genre = $this->db->query(
            "SELECT * FROM genres WHERE title=?",
            [$title]
        );
        if (count($genre) == 0) {
            throw new GenreNotFoundException();
        }
        return new Genre($genre);
    }
}