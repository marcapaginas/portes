<?php

use App\Models\Zona;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            // $table->string('siglas');
            // $table->string('codigo_postal');
            // $table->string('codigo_telefonico');
            $table->timestamps();
        });
    }

    public function zona()
    {
        return $this->belongsToMany(Zona::class);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
