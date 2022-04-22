<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarLinhas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linhas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('sgLinha');
            $table->integer('codigoLinha');
            $table->string('getOrigemIda');
            $table->string('destinoIda');
            $table->string('nomeLinha');
            $table->string('consorcio')->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linhas');
    }
}
