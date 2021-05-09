<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDiscipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'discipline_id',
        'course',
        'gr_id',
        'fromDate',
        'toDate',
    ];

    public function groups(){
        return $this->hasMany(Group::class, 'gr_id', 'id');
    }
}
