<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\MultiplicationTableService;
use App\Repositories\MultiplicationTableRepository;
use Illuminate\Http\JsonResponse;

class MultiplicationTableController extends BaseController
{
    private $multiplicationTableService;
    private $multiplicationTableRepository;

    public function __construct(MultiplicationTableService $multiplicationTableService, MultiplicationTableRepository $multiplicationTableRepository)
    {
        $this->multiplicationTableService = $multiplicationTableService;
        $this->multiplicationTableRepository = $multiplicationTableRepository;
    }

    private function sizeValidator($size): JsonResponse|null
    {
        if ($size < 1 || $size > 100 || !is_numeric($size)) {
            $message = 'Invalid size. Only numbers from 1 to 100.';
            return response()->json([$message], 400);
        }

        return null;
    }

    /**
     * Function for generate multiplication tble.
     * 
     * @param Request $request.
     * @return Response|JsonResponse Json with table or error message.
     */
    public function generateMultiplicationTable(Request $request): Response|JsonResponse
    {
        $size = $request->input('size');

        $validation = $this->sizeValidator($size);
        if ($validation) {
            return $validation;
        }

        $mTableExists = $this->multiplicationTableRepository->findBySize($size);

        if ($mTableExists) {
            return Response($mTableExists->data);
        }

        $mTable = $this->multiplicationTableService->generateMultiplicationTable($size);
        $result = json_encode($mTable, true);

        $this->multiplicationTableRepository->create($size, $result);

        return Response($result);
    }
}
