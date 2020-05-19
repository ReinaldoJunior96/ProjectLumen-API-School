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
});
