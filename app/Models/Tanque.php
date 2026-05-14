<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanque extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'pais_id',
        'fabricante_id',
        'combustible_id',
        'blindaje',
        'potencia_motor',
        'velocidad_maxima',
        'año_produccion',
        'descripcion_historica'
    ];

    // Un tanque pertenece a un país
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    // Un tanque pertenece a un fabricante
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

    // Un tanque pertenece a un combustible
    public function combustible()
    {
        return $this->belongsTo(Combustible::class);
    }

    // Un tanque tiene muchas municiones
    public function municiones()
    {
        return $this->belongsToMany(Municion::class, 'municion_tanque', 'tanque_id', 'municion_id');
    }

    // Un tanque participó en muchos conflictos
    public function conflictos()
    {
        return $this->belongsToMany(Conflicto::class, 'conflicto_tanque', 'tanque_id', 'conflicto_id');
    }
}
