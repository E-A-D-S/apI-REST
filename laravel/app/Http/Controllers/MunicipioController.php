<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Municipio;
use App\Http\Requests\MunicipioRequest;

class MunicipioController extends Controller
{
    public function index() 
    {
        try {
            $data = Municipio::all();
            return response()->json([
                'sucesso' => 200,
                'mensagem'  => 'api index',
                'dados'  => $data
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'erro' => $th->getCode(),
                'mensagem'  => 'api sem acesso' . $th->getMessage(),
            ]);        
        }
       
    }

    public function store(MunicipioRequest $request) 
    {
        try {
            $request->validated();
            //realizar o update do endereço, retornar json atualizado.
            $municipio = new Municipio;
            $municipio->codigo_uf = $request->codigoUF;
            $municipio->nome = $request->nome;
            $municipio->status = $request->status;
            $municipio->save();

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
    
    public function edit(MunicipioRequest $request , $id) 
    {
        try {
            $request->validated();
           /*$pessoa = Pessoa::find($id);
            $pessoa->nome = $request->nome;
            $pessoa->sobrenome => $request->sobrenome;
            $pessoa->idade => $request->idade;
            $pessoa->login => $request->login;
            $pessoa->senha => $request->senha;
            $pessoa->status => $request->status;

            $pessoa->update();*/
            Municipio::where('codigo_municipio', $id)
      
      ->update([
      'codigo_uf' => $request->codigoUF,
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
            $data = Municipio::find($id);
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




    


