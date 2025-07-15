<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_rol',
        'id_opcion',
        'puede_ver',
        'puede_crear',
        'puede_editar',
        'puede_eliminar',
    ];

    protected $casts = [
        'puede_ver' => 'boolean',
        'puede_crear' => 'boolean',
        'puede_editar' => 'boolean',
        'puede_eliminar' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function opcion(): BelongsTo
    {
        return $this->belongsTo(Opcion::class, 'id_opcion');
    }
}
