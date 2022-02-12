<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            // $table->increments('professor_id');
            $table->string('nome');
            $table->integer('idade');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
};
