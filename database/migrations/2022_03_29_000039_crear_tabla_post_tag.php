<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPostTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); //aqui no usamos la clase id de blueprint
            $table->foreign('post_id', 'fk__posttag_post')->references('id')->on('post')->onDelete('cascade')->onUpdate('restrict'); //si borran el post que borre este registro
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'fk_posttag_tag')->references('id')->on('tag')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('post_tag');
    }
}
