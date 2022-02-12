<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Disciplina::factory(10)->create();
        App\Disciplina::create([
            'nome' => 'JAVA'
            
        ]);

        App\Disciplina::create([
            'nome' => 'PHP'
            
        ]);
        App\Disciplina::create([
            'nome' => 'C/C++'
            
        ]);

        App\Disciplina::create([
            'nome' => 'Laravel'
            
        ]);
        App\Disciplina::create([
            'nome' => 'Javascript'
            
        ]);

    }
}
