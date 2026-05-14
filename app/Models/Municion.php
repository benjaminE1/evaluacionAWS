<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municion extends Model
{
    use HasFactory;

    protected $table = 'municiones';
    protected $fillable = ['nombre', 'calibre', 'tipo', 'descripcion'];

    // Una munición pertenece a muchos tanques
    public function tanques()
    {
        return $this->belongsToMany(Tanque::class, 'municion_tanque', 'municion_id', 'tanque_id');
    }
}
