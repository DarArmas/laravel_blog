<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaArchivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('archivable_id');
            $table->string('archivable_type', '150');
            $table->string('ruta', '150');
            $table->string('extension', '10');
            $table->string('peso');
            $table->boolean('local')->default(true);
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
        Schema::dropIfExists('archivo');
    }
}
