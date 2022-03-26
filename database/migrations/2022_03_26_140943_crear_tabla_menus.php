<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menus_id')->nullable(); //no siempre un menu tiene padre
            $table->foreign('menus_id', 'fk_menu_menu')->references('id')->on('menus')->onDelete('cascade')->onUpdate('restrict'); //tabla recurisve se relaciona con ella misma
            $table->string('nombre', 50);
            $table->string('url', 100);
            $table->unsignedInteger('orden')->default(1);
            $table->string('icono', 50)->nullable();
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
        Schema::dropIfExists('menus');
    }
}
