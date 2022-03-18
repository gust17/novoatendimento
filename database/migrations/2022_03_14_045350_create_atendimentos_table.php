<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agenda_id')->unsigned();
            $table->bigInteger('setor_id')->unsigned();
            $table->integer('aberto')->default(0);
            $table->bigInteger('user_id')->unsigned();
            $table->longText('descricao')->nullable();
            $table->bigInteger('atendente_id')->unsigned()->nullable();
            $table->bigInteger('terceiro_id')->unsigned()->nullable();
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
        Schema::dropIfExists('atendimentos');
    }
}
