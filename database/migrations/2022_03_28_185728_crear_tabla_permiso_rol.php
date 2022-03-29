<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPermisoRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) {
            $table->unsignedBigInteger('permiso_id'); //aqui no usamos la clase id de blueprint
            $table->foreign('permiso_id', 'fk_permisorol_permiso')->references('id')->on('permiso')->onDelete('cascade')->onUpdate('restrict'); //lave foranea
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id', 'fk_permisorol_rol')->references('id')->on('rol')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_rol');
    }
}
