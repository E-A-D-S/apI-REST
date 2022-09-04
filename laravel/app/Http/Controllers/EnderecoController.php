<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    public function index() 
    {
        try {
            $data = Endereco::all();
            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'api index',
                'dados'  => $data
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => $th->getCode(),
                'mensagem'  => 'api sem acesso' . $th->getMessage(),
            ],204);        
        }
       
    }

    public function store(Request $request) 
    {
        try {
            //realizar o update do endereço, retornar json atualizado.

            $endereco = new Endereco;
            $endereco->codigo_pessoa = $request->codigo_pessoa;
            $endereco->codigo_bairro = $request->codigo_bairro;
            $endereco->nome_rua = $request->nome_rua;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->cep = $request->cep;
            $endereco->save();
            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'endereço criado com sucesso'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 404,
                'mensagem'  => 'api sem acesso'
            ]);        
        }
       
    }
    
    public function edit($id) 
    {
        try {
            $data = Endereco::find($id);
            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'api edit'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 404,
                'mensagem'  => 'api sem acesso'
            ]);        
        }
       
    }
    
    public function destroy($id) 
    {
        try {
            $data = Endereco::find($id);
            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'api destroy',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 404,
                'mensagem'  => 'api sem acesso'
            ]);        
        }
       
    }
    
}

//fazer o relacionamento entre endereços e todas as outras tabelas//
//Relacionamentos estar dentro da Model//




    


