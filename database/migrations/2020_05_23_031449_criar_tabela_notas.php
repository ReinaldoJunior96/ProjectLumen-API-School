<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_notas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('tbl_alunos')->onDelete('cascade');
            $table->bigInteger('turma_id')->unsigned();
            $table->foreign('turma_id')->references('id')->on('tbl_turmas')->onDelete('cascade');
            $table->double('nota1');
            $table->double('nota2');
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
        Schema::dropIfExists('tbl_notas');
    }
}
