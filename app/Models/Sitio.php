<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sitio extends Model
{
    protected $table = 'sitio';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'id_area',
        'id_tipo_sitio',
        'estado',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

  
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function tipoSitio(): BelongsTo
    {
        return $this->belongsTo(TipoSitio::class, 'id_tipo_sitio');
    }
}
