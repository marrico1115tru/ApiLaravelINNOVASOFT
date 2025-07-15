<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opcion extends Model
{
    protected $table = 'opciones';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre_opcion',
        'descripcion',
        'ruta_frontend',
        'id_modulo',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function modulo(): BelongsTo
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }
}
