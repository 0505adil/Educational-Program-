<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineComponent extends Model
{
    use HasFactory;

    public function disciplines(){
        return $this->hasMany(Discipline::class);
    }
}
