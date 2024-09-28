<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'formacion';


    protected $fillable = [
        'formacion_id',
        'fecha_cursado',
        'fecha_finalizacion',
        'observaciones',
        'persona_id'
    ];

    public function formacion()
    {
        return $this->belongsTo(Docente::class, 'formacion_id');
    }

    public function personas(): BelongsTo
    {
        return $this->BelongsTo(Persona::class, 'persona_id');
    }
}
