<?php
use App\Application\Controllers\Genre\ListGenreController;
use App\Application\Controllers\Genre\ViewGenreController;

require '../vendor/autoload.php';

if (!isset($_GET['id'])) {
    $ctr = new ListGenreController();
} else {
    $ctr = new ViewGenreController();
}

$ctr->__invoke();