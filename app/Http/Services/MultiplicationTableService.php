<?php

namespace App\Http\Services;

class MultiplicationTableService 
{
    /**
     * Generates a multiplication table.
     *
     * @param int $size.
     */
    function generateMultiplicationTable($size)
    {
        $arr = [];

        for ($i = 1; $i <= $size; $i++) {
            $res = [];

            for ($j = 1; $j <= $size; $j++) {
                $res[$j] = $i * $j;
            }

            $arr[$i] = $res;
        }

        return $arr;
    }
}
