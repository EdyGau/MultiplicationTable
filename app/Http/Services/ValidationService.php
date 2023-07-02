<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;

class ValidationService 
{
    /**
     * Checks whether the given size is between 1 and 100.
     *
     * @param int $size.
     */
    public function sizeValidator($size): JsonResponse|bool
    {
        if ($size < 1 || $size > 100 || !is_numeric($size)) {
            $message = 'Invalid size. Only numbers from 1 to 100.';
            return response()->json([$message], 400);
        }

        return true;
    }
}
