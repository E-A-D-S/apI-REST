<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    
    protected $table = 'TB_ENDERECO';
    protected $primaryKey = 'codigo_endereco';
    protected $fillable = [
        'codigo_bairro',
        'codigo_pessoa',
        'nome_rua',
        'numero',
        'complemento',
        'cep'
    ];

    public $timestamps = false;

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'codigo_pessoa');
    }
}
