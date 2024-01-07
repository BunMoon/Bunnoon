<?php
use App\Application\Controllers\Auth\SigninController;

require '../vendor/autoload.php';

$ctr = new SigninController();
$ctr->__invoke();