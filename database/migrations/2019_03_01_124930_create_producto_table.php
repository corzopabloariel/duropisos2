<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('order',3)->nullable();
            $table->string('url')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('ventaja')->nullable();
            $table->string('color')->nullable();
            $table->string('url_mercadolibre')->nullable();
            $table->string('url_mercadopago')->nullable();
            $table->boolean('is_particular')->default(false);
            $table->boolean('is_profesional')->default(false);
            $table->unsignedInteger('pfamilia_id');
            $table->foreign('pfamilia_id')->references('id')->on('pfamilias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
