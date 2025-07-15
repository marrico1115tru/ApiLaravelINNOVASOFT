<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichaFormacion extends Model
{
    protected $table = 'fichas_formacion';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'id_titulado',
        'id_usuario_responsable',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
    public function titulado(): BelongsTo
    {
        return $this->belongsTo(Titulado::class, 'id_titulado');
    }

    public function usuarioResponsable(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_responsable');
    }
}
