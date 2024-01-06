<?php
use App\Application\Controllers\Auth\SignupController;

require '../vendor/autoload.php';

$ctr = new SignupController();
$ctr->__invoke();