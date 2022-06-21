<?php

use App\Models\Agencia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ancho')->default(0);
            $table->unsignedBigInteger('largo')->default(0);
            $table->unsignedBigInteger('alto')->default(0);
            $table->foreignId('agencia_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function agencia()
    {
        return $this->belongsTo(Agencia::class);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidas');
    }
}
