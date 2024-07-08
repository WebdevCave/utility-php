<?php

namespace Webdevcave\Utility;

class ArrayUtil
{
    /**
     *
     *
     * @param array        $array
     * @param array|string $key
     *
     * @return array
     */
    public static function filterKeys(array $array, array|string $key): array
    {
        return array_intersect_key($array, array_flip((array) $key));
    }

    /**
     * Convert an object to array.
     *
     * @param object $object
     * @param bool   $deep
     *
     * @return array
     */
    public static function fromObject(object $object, bool $deep = true): array
    {
        if ($deep) {
            return json_decode(json_encode($object), true);
        }

        return (array) $object;
    }
}
