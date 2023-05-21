<?php

namespace App\Repositories;

use App\Models\MultiplicationTable;

class MultiplicationTableRepository
{
    public function create($size, $data)
    {
        return MultiplicationTable::create([
            'size' => $size,
            'data' => $data,
        ]);
    }

    public function findBySize($size)
    {
        return MultiplicationTable::where('size', $size)->first();
    }
}
