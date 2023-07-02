<?php

namespace App\Contracts;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

interface MultiplicationTableControllerInterface
{
    /**
     * Function for showing multiplication table
     * 
     * @param Request $request.
     * @return Response|JsonResponse Json with table or error message.
     */
    public function showMultiplicationTable(Request $size):  Response|JsonResponse;
}