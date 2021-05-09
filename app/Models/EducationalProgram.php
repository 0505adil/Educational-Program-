<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalProgram extends Model
{
    use HasFactory;

    public function groups(){
        return $this->hasMany(Group::class, 'edProgram_id', 'id');
    }

    public function rups(){
        return $this->hasMany(RUP::class, 'edProgram_id', 'id');
    }
//    public function disciplines(){
//        return $this->hasMany(Discipline::class);
//    }
}
