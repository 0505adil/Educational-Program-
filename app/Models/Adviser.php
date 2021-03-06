<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'adviserId');
    }

    public function groups(){
        return $this->hasMany(Group::class, 'adviser_id', 'id');
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'adviser_disciplines');
    }
}
