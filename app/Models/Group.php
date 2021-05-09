<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function educationalProgram(){
        return $this->belongsTo(EducationalProgram::class, 'edProgram_id', 'id');
    }

    public function students(){
        return $this->hasMany(Student::class, 'gr_id', 'id');
    }

    public function teacherDiscipline(){
        return $this->belongsTo(TeacherDiscipline::class, 'gr_id', 'id');
    }

    public function disc(){
        return $this->hasMany(Discipline::class, 'rup_id', 'id');
    }

    public function adviser(){
        return $this->belongsTo(Adviser::class, 'adviser_id', 'id');
    }
}
