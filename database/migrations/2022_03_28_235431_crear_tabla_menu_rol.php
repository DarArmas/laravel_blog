<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenuRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_rol', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id'); //aqui no usamos la clase id de blueprint
            $table->foreign('menu_id', 'fk_menurol_menu')->references('id')->on('menu')->onDelete('cascade')->onUpdate('restrict'); //lave foranea
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id', 'fk_menurol_rol')->references('id')->on('rol')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_rol');
    }
}
