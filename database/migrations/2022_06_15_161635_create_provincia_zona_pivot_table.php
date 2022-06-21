<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvinciaZonaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincia_zona', function (Blueprint $table) {
            $table->unsignedBigInteger('provincia_id')->index();
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
            $table->unsignedBigInteger('zona_id')->index();
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->primary(['provincia_id', 'zona_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincia_zona');
    }
}
