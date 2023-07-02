<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface MultiplicationTableServiceInterface
{
    /**
     * Generates a multiplication table of the specified size.
     *
     * @param int $size The size of the multiplication table.
     * @return JsonResponse The generated multiplication table as a JSON response.
     */
    public function generateMultiplicationTableBySize($size): JsonResponse;
}