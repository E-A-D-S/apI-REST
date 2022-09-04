<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'codigo_uf';
    protected $table = 'TB_UF';
    protected $fillable = [
        'sigla',
        'nome',
        'status',
    ];

   public $timestamps = false;
}
