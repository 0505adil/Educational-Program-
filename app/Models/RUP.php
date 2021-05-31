<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RUP extends Model
{
    use HasFactory;

    protected $table = 'r_u_p_s';

    protected $fillable = [
        'disCycle',
        'disComponent',
        'discipline_id',
        'fromDate',
        'toDate',
        'edProgram_id',
        ];

    public function discipline(){
        return $this->hasOne(Discipline::class, 'rup_id', 'id');
    }

    public function disciplinesBez($ids){
        return $this->discipline()->whereNotIn('id', $ids);
    }

    public function educationalProgram(){
        return $this->belongsTo(EducationalProgram::class, 'edProgram_id', 'id');
    }
}
