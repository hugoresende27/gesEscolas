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
        Schema::create('professor_turma', function (Blueprint $table) {

            // $table->foreignId('turma_id')->constrained();
            // $table->foreignId('professor_id')->constrained();
            // $table->increments('id');
            $table->integer('professor_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->foreign('professor_id')->references('professor_id')->on('professors')->onDelete('cascade');
            $table->foreign('turma_id')->references('turma_id')->on('turmas')->onDelete('cascade');

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
        Schema::dropIfExists('professor_turma');
    }
};
