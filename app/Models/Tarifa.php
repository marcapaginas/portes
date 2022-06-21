<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agencia_id',
        //'agencia',
        'zona_id',
        //'zona',
        'medida_id',
        //'medida',
        'peso_id',
        //'peso',
        'tarifa_total',
        'tarifa_por_kg'
    ];

    public function agencia()
    {
        return $this->belongsTo(Agencia::class);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }

    public function peso()
    {
        return $this->belongsTo(Peso::class);
    }
}
