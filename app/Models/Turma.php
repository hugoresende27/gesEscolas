<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = "turmas";
    protected $guarded = [];

    protected $visible = ['turma_id'];

    public function professores()
    {
        // return $this->belongsToMany(Professor::class,'prof_turma');
        return $this->belongsToMany(Professor::class, 'professor_turma');
    }
}
