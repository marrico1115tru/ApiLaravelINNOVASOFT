<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titulado extends Model
{
    protected $table = 'titulados';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['nombre'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
