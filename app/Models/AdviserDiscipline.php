<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdviserDiscipline extends Model
{

    protected $fillable = [
        'course',
        'gr_id',
        'fromDate',
        'toDate'
];
    use HasFactory;
}
