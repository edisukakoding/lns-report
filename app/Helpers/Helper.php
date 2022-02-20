<?php

namespace App\Helpers;

class Helper
{
    /**
     * function to convert array numeric to array associative
     *
     * @param array $data
     * @param string|null $prompt
     * @return array
     */

    public static function assoc_of_array(array $data, string $prompt = null): array
    {
        $assoc = [];
        if($prompt) {
            $assoc[''] = $prompt;
        }
        foreach ($data as $val) {
            $assoc[$val] = $val;
        }
        return $assoc;
    }
}
