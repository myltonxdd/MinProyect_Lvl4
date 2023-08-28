<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cursos_alumnos extends Model
{
    use HasFactory;
    public function alumno():BelongsTo
    {
        return $this->belongsTo(alumnos::class, 'alumnos_id');
    }

    public function curso():BelongsTo
    {
        return $this->belongsTo(alumnos::class, 'cursos_id');
    }
}
