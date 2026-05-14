<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'capacidad_litros', 'descripcion'];

    // Un combustible tiene muchos tanques
    public function tanques()
    {
        return $this->hasMany(Tanque::class);
    }
}
