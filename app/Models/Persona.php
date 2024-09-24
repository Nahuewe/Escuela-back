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

    protected $guarded = [];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estados_id');
    }

    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    // public function documentaciones(): HasMany
    // {
    //     return $this->HasMany(Documentacion::class, 'persona_id');
    // }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }


}
