<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id_producto_inventario';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_producto',
        'stock',
        'fk_sitio',
    ];

    protected $casts = [
        'stock' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function sitio(): BelongsTo
    {
        return $this->belongsTo(Sitio::class, 'fk_sitio');
    }
}
