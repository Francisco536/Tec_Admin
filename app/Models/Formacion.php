<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_curso',
        'categoria',
        'tema',
        'fech_inicio',
        'fech_fin',
        'horario',
        'name_instructor',

    ];
}
