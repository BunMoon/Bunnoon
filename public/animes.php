<?php
use App\Application\Controllers\Anime\ViewAnimeController;

require '../vendor/autoload.php';

if (!isset($_GET['id'])) {
} else {
    $ctr = new ViewAnimeController();
}

$ctr->__invoke();