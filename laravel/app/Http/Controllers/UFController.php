<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\UF;
use App\Http\Requests\UFRequest;

class UFController extends Controller
{
    public function index() 
    {
        try {
            $data = UF::all();
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

    public function store(UFRequest $request) 
    {
        try {
            $request->validated();

            //realizar o update do endereço, retornar json atualizado.
            $UF = new UF;
            $UF->sigla = $request->sigla;
            $UF->nome = $request->nome;
            $UF->status = $request->status;
            $UF->save();

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
    
    public function edit(UFRequest $request, $id) 
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
            UF::where('codigo_uf', $id)
      
      ->update([
      'sigla' => $request->sigla,
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
            $data = UF::find($id);
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




    


