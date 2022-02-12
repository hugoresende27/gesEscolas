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
        Schema::create('turma_professors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prof_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->foreign('prof_id')->references('prof_id')->on('professors')->onDelete('cascade');
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
        Schema::dropIfExists('turma_professors');
    }
};
