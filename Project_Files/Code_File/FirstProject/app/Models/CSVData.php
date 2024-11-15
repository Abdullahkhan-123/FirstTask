<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CSVData extends Model
{
    protected $table = 'c_s_v_data';

    protected $fillable = [
        'Code',
        'Grouping',
        'Classification',
        'Specialization',
        'Definition',
        'Effective_Date',
    ];
}
