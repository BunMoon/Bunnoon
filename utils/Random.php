<?php

declare(strict_types=1);

namespace Utilities;

use Exception;

class Random
{
    /**
     * Generate a unique ID.
     * 
     * @return string
     */
    public static function uniqid(int $length = 25): string
    {
        if (function_exists('random_bytes')) {
            $bytes = random_bytes(intval(ceil($length / 2)));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(intval(ceil($length / 2)));
        } else {
            throw new Exception('no cryptographically secure random function available');
        }
        return substr(bin2hex($bytes), 0, $length);
    }
}