<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agencia_id',
        'provincia_id',
        'numero'
    ];

    public function agencia()
    {
        return $this->belongsTo(Agencia::class);
    }

    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class);
    }

    public function provincia()
    {
        return $this->belongsToMany(Provincia::class);
    }

    public function getTodasLasZonasAttribute()
    {
        $todaslaszonas = Provincia::where('id', 'provincia_id')->get()->toArray();
        return implode(', ', $todaslaszonas);
    }
}
