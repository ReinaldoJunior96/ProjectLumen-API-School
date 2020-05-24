<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\{Aluno, Nota, Turma, Tutor};
class TutorController extends Controller
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
        return Tutor::all();
        
    }
    public function show($tutor){
        return Tutor::find($tutor);
    }
    public function store(Request $request){
        Tutor::create($request->all());
        return $request;
    }
    public function update(Request $request, $tutor){
        $tutor_edit = Tutor::find($tutor);
        $tutor_edit->update($request->all());        
    }
    public function delete($tutor){
        $tutor_delete = Tutor::find($tutor);
        $tutor_delete->delete();
    }
    
    public function tutor_turmas($tutor){
        return Tutor::find($tutor)->turmas;
    }
}
