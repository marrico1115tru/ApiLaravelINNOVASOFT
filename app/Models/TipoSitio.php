<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSitio extends Model
{
    protected $table = 'tipo_sitio';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['nombre'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}
