<?php

use App\Models\Peso;
use App\Models\Zona;
use App\Models\Medida;
use App\Models\Tarifa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->unsignedBigInteger('volumetrico');
            $table->timestamps();
        });
    }

    public function zona()
    {
        return $this->hasMany(Zona::class);
    }

    public function medida()
    {
        return $this->hasMany(Medida::class);
    }

    public function peso()
    {
        return $this->hasMany(Peso::class);
    }

    public function tarifa()
    {
        return $this->hasMany(Tarifa::class);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencias');
    }
}
