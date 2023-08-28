<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cursos extends Model
{
    use HasFactory;
    /* public function cursos_alumno():HasMany
    {
        return $this->hasMany(cursos_alumnos::class, 'cursos_id');
    } */

    public function docente():BelongsTo
    {
        return $this->belongsTo(docentes::class, 'docente_id');
    }
}
