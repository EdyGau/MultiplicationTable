<?php

namespace App\Http\Services;

use Illuminate\Http\JsonResponse;
use App\Http\Helpers\MultiplicationTableHelper;
use App\Contracts\MultiplicationTableServiceInterface;

class MultiplicationTableService implements MultiplicationTableServiceInterface
{
    private $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    /**
     * Generates a multiplication table of the specified size.
     *
     * @param int $size The size of the multiplication table.
     * @return JsonResponse The generated multiplication table as a JSON response.
     */
    public function generateMultiplicationTableBySize($size): JsonResponse
    {
        $validation = $this->validationService->sizeValidator($size);
        if ($validation !== true) {
            return $validation;
        }

        $mTable = MultiplicationTableHelper::generateTable($size);

        return response()->json($mTable);
    }
}
