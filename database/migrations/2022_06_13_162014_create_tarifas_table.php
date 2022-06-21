<?php

use App\Models\Zona;
use App\Models\Agencia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agencia_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //$table->string('agencia');
            $table->foreignId('zona_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //$table->json('zona');
            $table->foreignId('medida_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //$table->json('medida');
            $table->foreignId('peso_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //$table->unsignedBigInteger('peso');
            $table->decimal('tarifa_total')->default(0);
            $table->decimal('tarifa_por_kg')->default(0);
            $table->timestamps();
        });
    }

    // public function agencia()
    // {
    //     return $this->hasOne(Agencia::class);
    // }

    // public function zona()
    // {
    //     return $this->hasOne(Zona::class);
    // }

    // public function medida()
    // {
    //     return $this->hasOne(Medida::class);
    // }

    // public function peso()
    // {
    //     return $this->hasOne(Peso::class);
    // }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarifas');
    }
}
