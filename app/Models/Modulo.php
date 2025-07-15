<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modulo extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['nombre_modulo'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

   
    public function opciones(): HasMany
    {
        return $this->hasMany(Opcion::class, 'id_modulo');
    }
}
