<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'agencia_id',
        'tramo_peso'
    ];

    public function agencia()
    {
        return $this->belongsTo(Agencia::class);
    }

    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class);
    }
}
