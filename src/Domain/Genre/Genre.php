<?php

declare(strict_types=1);

namespace App\Domain\Genre;

class Genre
{
    public function __construct(private array $record)
    {
    }

    public function id(): int
    {
        return $this->record['id'];
    }

    public function enName(): string
    {
        return $this->record['enName'];
    }

    public function thName(): string
    {
        return $this->record['thName'];
    }

    public function title(): string
    {
        return $this->record['title'];
    }
}