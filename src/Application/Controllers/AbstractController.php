<?php

declare(strict_types=1);

namespace App\Application\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    public function __invoke()
    {
        date_default_timezone_set('Asia/Bangkok');
        $this->view();
    }

    abstract protected function view(): void;

    protected function render(string $template, array $ctx = []): void
    {
        echo self::twigEnv()->render($template, $ctx);
    }

    private static function twigEnv()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../../templates');
        $twig = new Environment($loader, []);
        return $twig;
    }
}