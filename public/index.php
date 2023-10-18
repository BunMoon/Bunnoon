<?php
use App\Application\Controllers\General\HomeController;

require '../vendor/autoload.php';

$ctr = new HomeController();
$ctr->__invoke();