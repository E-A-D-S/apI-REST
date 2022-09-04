<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Bairro;

class BairroController extends Controller
{
    public function index() 
    {
        try {
            $data = Bairro::all();
            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'ok',
                'dados'  => $data
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => $th->getCode(),
                'mensagem'  => 'api sem acesso' . $th->getMessage(),
            ]);        
        }
       
    }

    public function store(Request $request) 
    {
        try {
            //realizar o update do endereço, retornar json atualizado.
            $bairro = new Bairro;
            $bairro->codigo_municipio = $request->codigoMunicipio;
            $bairro->nome = $request->nome;
            $bairro->status = $request->status;
            $bairro->save();

            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'endereço criado com sucesso'
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return response()->json([
                'erro' => 404,
                'mensagem'  => 'api sem acesso'
            ]);        
        }
       
    }
    
    public function edit(Request $request , $id) 
    {
        try {
           /*$pessoa = Pessoa::find($id);
            $pessoa->nome = $request->nome;
            $pessoa->sobrenome => $request->sobrenome;
            $pessoa->idade => $request->idade;
            $pessoa->login => $request->login;
            $pessoa->senha => $request->senha;
            $pessoa->status => $request->status;

            $pessoa->update();*/
            Bairro::where('codigo_bairro', $id)
      
      ->update([
      'codigo_bairro' => $request->codigoMunicipio,
      'nome' => $request->nome,
      'status' => $request->status
     ]);

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
            $data = Bairro::find($id);
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




    


