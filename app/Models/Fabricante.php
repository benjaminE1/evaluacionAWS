<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'pais', 'año_fundacion', 'descripcion'];

    // Un fabricante tiene muchos tanques
    public function tanques()
    {
        return $this->hasMany(Tanque::class);
    }
}
