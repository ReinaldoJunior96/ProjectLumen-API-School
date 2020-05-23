<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Aluno;

class AlunoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        return Aluno::all();
    }
    public function show($aluno)
    {
        return (Aluno::find($aluno) == NULL) ? 'Aluno não encontrado' : Aluno::find($aluno);
    }

    public function store(Request $request)
    {
        try {
            Aluno::create($request->all());
            return response()->json(['Mensagem' => 'Cadastro realizado com sucesso!!']);
        } catch (QueryException $ex) {
            return response()->json(['Mensagem' => 'Ocorreu um erro durante o cadastro!!']);
        }
    }

    public function update(Request $request, $aluno)
    {
        try {
            $aluno = Aluno::find($aluno);
            $aluno->update($request->all());
            return response()->json(['Mensagem' => 'Aluno alterado com sucesso!!']);
        } catch (QueryException $ex) {
            return response()->json(['Mensagem' => 'Erro ao alterar aluno!!']);
        }
    }

    public function delete($aluno)
    {
        try {
            $aluno_d = Aluno::find($aluno);
            $aluno_d->delete();
            return response()->json(['Mensagem' => 'Aluno deletado com sucesso!!']);
        } catch (QueryException $ex) {
            return response()->json(['Mensagem' => 'Erro ao deletar aluno!!']);
        }
    }

    public function listNotas($aluno)
    {
        return Aluno::find($aluno)->notas;
        /* 
            turmas = mtm-mat-4F , mtm-mat-3M, prt-mat-4F, prt-vesp-3M

            
            Aluno(id)->notas(turma_id,aluno_id, N1...N4) 

        
        
        */





    }
}
