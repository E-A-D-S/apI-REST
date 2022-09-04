<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Http\Requests\PessoaRequest;

class PessoaController extends Controller
{
    public function index()
    {
        try {
            
            $data = Pessoa::with('enderecos')->GET();
            return response()->json([
                'data' => $data
                
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => $th->getCode(),
                'mensagem'  => 'api sem acesso' . $th->getMessage(),
            ]);
        }
    }

    public function store(PessoaRequest $request)
    {
        try {
            $request->validated();

            //realizar o update do endereço, retornar json atualizado.
            $pessoa = new Pessoa;
            $pessoa->nome = $request->nome;
            $pessoa->sobrenome = $request->sobrenome;
            $pessoa->idade = $request->idade;
            $pessoa->login = $request->login;
            $pessoa->senha = $request->senha;
            $pessoa->status = $request->status;
            $pessoa->save();
            foreach ($request->enderecos as $endereco) {
                $novo_endereco = new Endereco;
                $novo_endereco->codigo_pessoa = $pessoa->codigo_pessoa;
                $novo_endereco->nome_rua = $endereco['nomeRua'];
                $novo_endereco->codigo_bairro = $endereco['codigoBairro'];
                $novo_endereco->cep = $endereco['cep'];
                $novo_endereco->complemento = $endereco['complemento'];
                $novo_endereco->numero = $endereco['numero'];

                $novo_endereco->save();
            }


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

    public function edit(PessoaRequest $request, $id)
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
            Pessoa::where('codigo_pessoa', $id)

                ->update([
                    'nome' => $request->nome,
                    'sobrenome' => $request->sobrenome,
                    'idade' => $request->idade,
                    'login' => $request->login,
                    'senha' => $request->senha,
                    'status' => $request->status

                ]);
            foreach ($request->enderecos as $endereco) {
                if (empty($endereco['codigoEndereco'])) {
                    $novo_endereco = new Endereco;
                    $novo_endereco->codigo_pessoa = $endereco['codigoPessoa'];
                    $novo_endereco->nome_rua = $endereco['nomeRua'];
                    $novo_endereco->codigo_bairro = $endereco['codigoBairro'];
                    $novo_endereco->cep = $endereco['cep'];
                    $novo_endereco->complemento = $endereco['complemento'];
                    $novo_endereco->numero = $endereco['numero'];

                    $novo_endereco->save();
                } else {
                    Endereco::where('codigo_endereco', $endereco['codigoEndereco'])

                        ->update([
                            'codigo_pessoa' => $endereco['codigoPessoa'],
                            'nome_rua' => $endereco['nomeRua'],
                            'codigo_bairro' => $endereco['codigoBairro'],
                            'cep' => $endereco['cep'],
                            'complemento' => $endereco['complemento'],
                            'numero' => $endereco['numero']

                        ]);
                }
            }


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
            $data = Pessoa::find($id);
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
