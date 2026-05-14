<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'descripcion'];

    // Un país tiene muchos tanques
    public function tanques()
    {
        return $this->hasMany(Tanque::class);
    }
}
