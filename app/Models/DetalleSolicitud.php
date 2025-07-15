<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleSolicitud extends Model
{
    protected $table = 'detalle_solicitud';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_solicitud',
        'id_producto',
        'cantidad_solicitada',
        'observaciones',
    ];

    protected $casts = [
        'cantidad_solicitada' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function solicitud(): BelongsTo
    {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
