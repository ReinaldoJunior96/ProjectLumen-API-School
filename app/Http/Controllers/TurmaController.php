<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\{Aluno, Nota, Turma, Tutor};
class TurmaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(){
        return Turma::all();
    }
    public function show($turma){
        return Turma::find($turma);
    }
    public function store(Request $request){
        Turma::create($request->all());
        //return $request;
    }
    public function update(Request $request, $turma){
        $turma_update = Turma::find($turma);
        $turma_update->update($request->all());
    }
    public function delete($turma){
        $turma_delete = Turma::find($turma);
        $turma_delete->delete();
    }

    public function turma_tutor($turma){
        return Turma::find($turma)->tutor;
    }
}
