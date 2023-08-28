<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class alumnos extends Model
{
    use HasFactory;
    public function cursos_alumno():HasMany
    {
        return $this->hasMany(cursos_alumnos::class, 'alumnos_id');
    }
}
