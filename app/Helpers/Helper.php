<?php

namespace App\Helpers;

class Helper
{
    /**
     * function to convert array numeric to array associative
     *
     * @param array $data
     * @return array
     */

    public static function assoc_of_array(array $data): array
    {
        $assoc = [];
        foreach ($data as $val) {
            $assoc[$val] = $val;
        }
        return $assoc;
    }
}
