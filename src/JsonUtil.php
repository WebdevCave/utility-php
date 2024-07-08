<?php

namespace Webdevcave\Utility;

use Exception;

class JsonUtil
{
    /**
     * Decode json string.
     *
     * @param string $json
     * @param bool   $associative
     * @param int    $depth
     * @param        $flags
     *
     * @return mixed
     */
    public static function decode(string $json, bool $associative = true, int $depth = 512, $flags = JSON_THROW_ON_ERROR): mixed
    {
        return json_decode($json, $associative, $depth, $flags);
    }

    /**
     * Create a json string.
     *
     * @param mixed $value
     * @param int   $options
     * @param int   $depth
     *
     * @return string
     */
    public static function encode(mixed $value, int $options = 0, int $depth = 512): string
    {
        return json_encode($value, $options, $depth);
    }

    /**
     * Checks if provided string is a valid json.
     *
     * @param string $json
     * @param int    $depth
     * @param int    $flags
     *
     * @return bool
     */
    public static function validate(string $json, int $depth = 512, int $flags = 0): bool
    {
        if (function_exists('json_validate')) {
            return json_validate($json, $depth, $flags);
        }

        try {
            self::decode($json, $depth, $flags);
        } catch (Exception $exception) { //suppressing exception
            return false;
        }

        return true;
    }
}
