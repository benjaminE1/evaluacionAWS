<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conflicto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin', 'descripcion', 'ubicacion'];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    // Un conflicto está relacionado con muchos tanques
    public function tanques()
    {
        return $this->belongsToMany(Tanque::class, 'conflicto_tanque', 'conflicto_id', 'tanque_id');
    }
}
