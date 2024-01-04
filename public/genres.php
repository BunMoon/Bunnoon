<?php
use App\Application\Controllers\Genre\ListGenreController;

require '../vendor/autoload.php';

$ctr = new ListGenreController();
$ctr->__invoke();