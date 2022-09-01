<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('estado');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_expediente')->unsigned();
            $table->foreign('id_expediente')->references('id')->on('expedientes');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('historico_expedientes');
    }
}
