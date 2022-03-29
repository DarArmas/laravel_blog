<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_comentario_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'fk_comentario_post')->references('id')->on('post')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('comentario_id')->nullable();
            $table->foreign('comentario_id', 'fk_comentario_comentario')->references('id')->on('comentario')->onDelete('cascade')->onUpdate('restrict'); //relacion interna
            $table->text('contenido');
            $table->boolean('estado')->default(0); //para que el usuario sea verificado
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
        Schema::dropIfExists('comentario');
    }
}
