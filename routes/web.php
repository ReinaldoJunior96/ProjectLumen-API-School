<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
    return "Project Lumen API School ;D";
});

$router->group(['prefix'=>'alunos'], function() use($router){    
    $router->get('/','AlunoController@index'); /* Retorna todos os alunos */
    $router->get('/{aluno}', 'AlunoController@show'); /* Retorna apenas um aluno */
    $router->post('/', 'AlunoController@store'); /* Faz uma nova requisição para criar um novo aluno  */
    $router->put('/{aluno}', 'AlunoController@update'); /* Faz uma requisição para editar o aluno */
    $router->delete('/{aluno}', 'AlunoController@delete'); /* Requisição para deleter um aluno */
    /* Retornos personalizados */
    $router->get('/{aluno}/notas','AlunoController@aluno_notas'); /* Retorna a nota de um aluno */
    $router->get('/{aluno}/turmas','AlunoController@aluno_turma'); /* Retorna as turmas de um aluno */
    $router->get('/{aluno}/turmas/tutores', 'AlunoController@aluno_tutor'); /* Retorna o tutor da turma de um aluno */
});


$router->group(['prefix' => 'turmas'], function() use($router){
    $router->get('/','TurmaController@index');
    $router->get('/{turma}', 'TurmaController@show');
    $router->post('/', 'TurmaController@store');
    $router->put('/{turma}', 'TurmaController@update');
    $router->delete('/{turma}', 'TurmaController@delete');
    /* Retornos personalizados */
    $router->get('/{turma}/alunos','TurmaController@turma_alunos');
    $router->get('/{turma}/tutor' , 'TurmaController@turma_tutor');
    $router->get('/{turma}/notas', 'TurmaController@turma_notas');
});

$router->group(['prefix' => 'notas'], function() use($router){
    $router->post('/', 'NotaController@store');
    $router->put('/{nota}', 'NotaController@update');
    $router->delete('/{nota}', 'NotaController@delete');
});


$router->group(['prefix' => 'tutores'], function() use($router){
    $router->get('/', 'TutorController@index');
    $router->get('/{tutor}', 'TutorController@show');
    $router->post('/', 'TutorController@store');
    $router->put('/{tutor}', 'TutorController@update');
    $router->delete('/{tutor}', 'TutorController@delete');
    /* Retornos personalizados */
    $router->get('/{tutor}/turmas', 'TutorController@tutor_turmas');
});