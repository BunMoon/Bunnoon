<?php

declare(strict_types=1);

namespace App\Infrastructure;

use Library\Database;

class Infrastructure
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}