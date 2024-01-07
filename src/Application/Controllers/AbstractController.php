<?php

declare(strict_types=1);

namespace App\Application\Controllers;

use App\Application\Middlewares\Authentication;
use App\Application\Middlewares\Authorization;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    protected Authentication $authentication;
    protected Authorization $authorization;

    public function __invoke()
    {
        date_default_timezone_set('Asia/Bangkok');
        $this->authentication = new Authentication();
        $this->authorization = new Authorization();
        $this->view();
    }

    abstract protected function view(): void;

    protected function render(string $template, array $ctx = []): void
    {
        $ctx['auth'] = $this->authentication->isAuthenticated;
        $ctx['user'] = $this->authorization->user;
        echo self::twigEnv()->render($template, $ctx);
    }

    private static function twigEnv()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../../templates');
        $twig = new Environment($loader, []);
        return $twig;
    }
}