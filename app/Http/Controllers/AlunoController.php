<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Aluno;
class AlunoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    public function index(){
        return Aluno::all();
    }
    public function show($aluno){
        return Aluno::find($aluno);
    }
    
}
