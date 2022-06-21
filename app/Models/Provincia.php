<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        // 'siglas',
        // 'codigo_postal',
        // 'codigo_telefonico'
    ];

    public function zona()
    {
        return $this->belongsToMany(Zona::class);
    }
}
