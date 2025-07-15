<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sede extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'id_centro_formacion',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
    public function centroFormacion(): BelongsTo
    {
        return $this->belongsTo(CentroFormacion::class, 'id_centro_formacion');
    }
}
