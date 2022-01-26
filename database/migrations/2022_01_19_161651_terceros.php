<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Terceros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('TipoTercero');
        Schema::create('TipoTercero', function (Blueprint $table) {
            $table->id();
            $table->string('Direccion');
            $table->integer('Telefono');
            $table->integer('NIT');
            $table->string('NombreTercero');
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
        //
    }
}
