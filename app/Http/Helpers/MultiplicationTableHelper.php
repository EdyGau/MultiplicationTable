<?php

namespace App\Http\Helpers;

class MultiplicationTableHelper
{
    /**
     * Generates a multiplication table.
     *
     * @param int $size The size of the multiplication table.
     * @return array The generated multiplication table.
     */
    public static function generateTable($size): array
    {
        $multiplicationTable = [];
        $res = [];

        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $size; $j++) {
                $res[$j] = $i * $j;
            }
            $multiplicationTable[$i] = $res;
        }

        return $multiplicationTable;
    }
}
