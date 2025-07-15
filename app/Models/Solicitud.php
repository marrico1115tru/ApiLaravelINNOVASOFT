<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_usuario_solicitante',
        'fecha_solicitud',
        'estado_solicitud',
    ];

    protected $casts = [
        'fecha_solicitud' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_solicitante');
    }
}
