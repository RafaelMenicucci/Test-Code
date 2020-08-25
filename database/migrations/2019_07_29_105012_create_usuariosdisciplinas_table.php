<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosdisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariosdisciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('idUsuario');
            $table->unsignedbigInteger('idDisciplina');
            $table->timestamps();

            $table->foreign('idUsuario')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');

            $table->foreign('idDisciplina')
                ->references('id')
                ->on('disciplinas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuariosdisciplinas');
    }
}
