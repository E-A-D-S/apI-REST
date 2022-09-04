<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'codigo_municipio';
    protected $table = 'TB_municipio';
    protected $fillable = [
        'codigo_uf',
        'nome',
        'status',
    ];

   public $timestamps = false;
}
