<?php

namespace Webdevcave\Utility;

class StringUtil
{
    public const DEFAULT_RANDOM_POOL = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /**
     * Checks the length of a string (byte-safe)
     *
     * @param string $string
     *
     * @return int
     */
    public static function length(string $string): int
    {
        return mb_strlen($string);
    }

    /**
     * Generate a random string using random bytes.
     *
     * @param $length
     *
     * @return string
     */
    public static function random($length = 10): string
    {
        return substr(bin2hex(random_bytes($length)), 0, $length);
    }

    /**
     * Generate a random string using provided pool.
     *
     * @param int    $length
     * @param string $pool
     *
     * @return string
     */
    public static function randomPool(int $length = 10, string $pool = self::DEFAULT_RANDOM_POOL): string
    {
        return mb_substr(self::shuffle(str_repeat($pool, $length)), 0, $length);
    }

    /**
     * Shuffle string (byte-safe).
     *
     * @param string $string
     *
     * @return string
     */
    public static function shuffle(string $string): string
    {
        $temp = preg_split("//u", $string);
        shuffle($temp);
        return join('', $temp);
    }
}
