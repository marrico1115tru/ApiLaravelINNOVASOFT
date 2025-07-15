<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntregaMaterial extends Model
{
    protected $table = 'entrega_material';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_solicitud',
        'id_usuario_responsable',
        'fecha_entrega',
        'observaciones',
        'id_ficha_formacion',
    ];

    protected $casts = [
        'fecha_entrega' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }

    public function responsable(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_responsable');
    }

    public function ficha(): BelongsTo
    {
        return $this->belongsTo(FichaFormacion::class, 'id_ficha_formacion');
    }
}
