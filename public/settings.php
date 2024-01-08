<?php
use App\Application\Controllers\Setting\ProfileSettingController;

require '../vendor/autoload.php';

switch ($_GET['route'] ?? null) {
    case 'profile':
        $ctr = new ProfileSettingController();
        break;

    default:
        echo 'Setting does not exist.';
        break;
}

if (isset($ctr))
    $ctr->__invoke();