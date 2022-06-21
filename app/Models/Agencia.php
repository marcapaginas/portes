<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'volumetrico'
    ];

    public function medida()
    {
        return $this->hasMany(Medida::class);
    }
    public function peso()
    {
        return $this->hasMany(Peso::class);
    }
    public function zona()
    {
        return $this->hasMany(Zona::class);
    }
    public function tarifa()
    {
        return $this->hasMany(Tarifa::class);
    }
}
