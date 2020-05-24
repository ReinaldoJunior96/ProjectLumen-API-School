<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\{Aluno, Nota, Turma};

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

    public function aluno_notas($aluno)
    {
        return Aluno::find($aluno)->notas;
    }

    public function aluno_turma($aluno)
    {
        $turmas_arr = array();
        $aluno_nota = Aluno::find($aluno)->notas;
        $aluno_arr = json_decode($aluno_nota);
        foreach ($aluno_arr as $value) :
            array_push($turmas_arr, Nota::find($value->id)->turma);
        endforeach;
        $turmas_json = json_encode($turmas_arr);
        return $turmas_json;
    }

    public function aluno_tutor($aluno)
    {
        $notas_id = array();
        $turmas_id = array();
        $tutores = array();
        $aluno_nota = Aluno::find($aluno)->notas;
        $aluno_arr = json_decode($aluno_nota);
        foreach ($aluno_arr as $value) :
            array_push($notas_id, $value->id);
        endforeach;
        foreach ($notas_id as $t) :
            array_push($turmas_id, Nota::find($t)->turma);
        endforeach;
        foreach ($turmas_id as $v) :
            array_push($tutores, Turma::find($v->id)->tutor);
        endforeach;
        $tutores_json = json_encode($tutores);
        return $tutores_json;
    }
}
