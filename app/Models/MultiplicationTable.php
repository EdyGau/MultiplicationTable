<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultiplicationTable extends Model
{
    protected $table = 'multiplication_table';

    protected $fillable = [
        'size',
        'data',
    ];
}