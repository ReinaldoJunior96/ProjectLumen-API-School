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
}
