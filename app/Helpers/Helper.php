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

    /**
     * @param int $number
     * @return string
     */
    public static function numberToRomanRepresentation(int $number): string
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public static function renderResultAssessment(string $value): string
    {
        $icon = "<div class='check icon'></div>";
        $style = "";
        return match ($value) {
            "BAIK" => "<td $style>$icon</td><td></td><td></td>",
            "CUKUP" => "<td></td><td $style>$icon</td><td></td>",
            "PERLU DILATIH" => "<td></td><td></td><td $style>$icon</td>",
        };
    }
}
