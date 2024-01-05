<?php

declare(strict_types=1);

namespace App\Domain\Episode;

class Episode
{
    public function __construct(private array $record)
    {
    }

    public function id(): int
    {
        return $this->record['id'];
    }

    public function episode(): int
    {
        return $this->record['episode'];
    }

    public function sound(): string
    {
        return $this->record['sound'];
    }

    public function subtitle(): string
    {
        return $this->record['subtitle'];
    }

    public function source(): string
    {
        return $this->record['source'];
    }

    public function animeId(): int
    {
        return $this->record['animeId'];
    }
}