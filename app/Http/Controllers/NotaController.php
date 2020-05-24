<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\{Aluno, Nota, Turma, Tutor};
class NotasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function store(Request $request){
        Nota::create($request->all());
    }
    public function update(Request $request, $nota){
        $nota_id = Nota::find($nota);
        $nota_id->update($request->all());
    }
    public function delete($nota){
        $nota_id = Nota::find($nota);
        $nota_id->delete();
    }
}
