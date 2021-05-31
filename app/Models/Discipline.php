<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

            protected $fillable = [
        'title_kz',
        'title_ru' ,
        'title_en',
        'code',
        'credits',
        'semestr',
        'lectures',
        'practises',
        'labs',
        'rup_id',

    ];


//    public function educationalPrograms(){
//        return $this->belongsTo(EducationalProgram::class, 'edProgram_id', 'id');
//    }

//    public function disciplineComponent(){
//        return $this->belongsTo(DisciplineComponent::class, 'disciplineComponent_id', 'id');
//    }

    public function rup(){

        return $this->belongsTo(RUP::class, 'rup_id', 'id');

    }

    public function users()
    {
        return $this->belongsToMany(Student::class, 'student_disciplines');
    }

    public function advisers()
    {
        return $this->belongsToMany(Adviser::class, 'adviser_disciplines');
    }
}
