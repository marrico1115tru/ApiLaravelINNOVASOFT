<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_entrega',
        'tipo_movimiento',
        'cantidad',
        'id_producto_inventario',
        'fecha_movimiento',
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'fecha_movimiento' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function entrega(): BelongsTo
    {
        return $this->belongsTo(EntregaMaterial::class, 'id_entrega');
    }

    public function inventario(): BelongsTo
    {
        return $this->belongsTo(Inventario::class, 'id_producto_inventario', 'id_producto_inventario');
    }
}
