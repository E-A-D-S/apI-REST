<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pessoa extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'codigo_pessoa';
    protected $table = 'TB_PESSOA';
    protected $fillable = [
        'nome',
        'sobrenome',
        'idade ',
        'login',
        'senha', 
        'status'
    ];

   public $timestamps = false;

   
   public function enderecos()
   {
       return $this->hasMany(Endereco::class, 'codigo_endereco');
   }

}
