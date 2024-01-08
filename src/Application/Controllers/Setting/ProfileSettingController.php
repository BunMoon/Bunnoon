<?php

declare(strict_types=1);

namespace App\Application\Controllers\Setting;

class ProfileSettingController extends AbstractSettingController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function view(): void
    {
        $this->render('SettingProfile.html', ['csrf_token' => $this->csrf->token]);
    }

    /**
     * {@inheritDoc}
     */
    protected function action(): void
    {
        print_r($_POST);
        if (isset($_POST['profile'])) {
            $this->profile();
        }
    }

    private function profile(): void
    {
        echo 'Profile updated!';
    }
}