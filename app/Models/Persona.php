<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='persona';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'fecha_cursado',
        'edad',
        'sexo_id',
        'telefono',
        'domicilio',
        'ocupacion',
        'enfermedad',
        'becas',
        'formacion_id',
        'observacion',
        'estados_id',
    ];

    protected $guarded = [];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estados_id');
    }

    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function formacion()
    {
        return $this->belongsTo(Docente::class, 'formacion_id');
    }
}
