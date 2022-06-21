<?php

namespace App\Models;

use App\Models\Agencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medida extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ancho',
        'largo',
        'alto',
        'agencia_id'
    ];

    public function agencia()
    {
        return $this->belongsTo(Agencia::class);
    }

    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class);
    }

    public function getNombreMedidaAttribute()
    {
        return "{$this->ancho} x {$this->largo} x {$this->alto} ";
    }
}
