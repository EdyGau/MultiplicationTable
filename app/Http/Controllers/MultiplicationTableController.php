<?php

namespace App\Http\Controllers;

use App\Contracts\MultiplicationTableControllerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\MultiplicationTableService;
use Illuminate\Http\JsonResponse;

class MultiplicationTableController extends BaseController implements MultiplicationTableControllerInterface
{
    private $multiplicationTableService;

    public function __construct(MultiplicationTableService $multiplicationTableService,)
    {
        $this->multiplicationTableService = $multiplicationTableService;
    }

    /**
     * Function for showing multiplication table
     * 
     * @param Request $request.
     * @return Response|JsonResponse Json with table or error message.
     */
    public function showMultiplicationTable(Request $request): Response|JsonResponse
    {
        $size = $request->input('size');
        $mTable = $this->multiplicationTableService->generateMultiplicationTableBySize($size);
    
        return $mTable;
    }
}
