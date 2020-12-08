<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_carrito', function (Blueprint $table) {
            $table->id();
            $table->foreignId('IdCarrito')->constrained('carritos');
            $table->foreignId('IdProductos')->constrained('productos');
            $table->integer('Cantidad');
            $table->decimal('Precio',13,2);
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
        Schema::dropIfExists('det_carrito');
    }
}
