<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = "professors";
    protected $guarded = [];
    protected $visible = ['professor_id'];

    public function turmas()
    {
        // return $this->belongsToMany(Turma::class,'prof_turma');
        return $this->hasMany(Turma::class, 'professor_id');
    }

    public function disciplina(){
        return $this->hasOne(Disciplina::class);
    }
}
