<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPostsCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('posts_id'); //aqui no usamos la clase id de blueprint
            $table->foreign('posts_id', 'fk_postcategoria_post')->references('id')->on('posts')->onDelete('cascade')->onUpdate('restrict'); //si borran el post que borre este registro
            $table->unsignedBigInteger('categorias_id');
            $table->foreign('categorias_id', 'fk_postcategoria_categoria')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');//no se puede borrar categoria que ya tenga posts
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_categorias');
    }
}
