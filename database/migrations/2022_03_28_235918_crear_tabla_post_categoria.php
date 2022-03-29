<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPostCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id'); //aqui no usamos la clase id de blueprint
            $table->foreign('post_id', 'fk_postcategoria_post')->references('id')->on('post')->onDelete('cascade')->onUpdate('restrict'); //si borran el post que borre este registro
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id', 'fk_postcategoria_categoria')->references('id')->on('categoria')->onDelete('restrict')->onUpdate('restrict');//no se puede borrar categoria qu
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categoria');
    }
}
