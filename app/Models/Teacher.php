<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'teacherId');
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'teacher_disciplines');
    }
}
