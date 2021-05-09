<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'confirmed'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'studentId');
    }

    public function group(){

        return $this->belongsTo(Group::class, 'gr_id', 'id');

    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'student_disciplines');
    }
}
