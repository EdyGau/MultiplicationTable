<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MultiplicationTableInterface
{
    public function generateMultiplicationTable(Request $size);
}