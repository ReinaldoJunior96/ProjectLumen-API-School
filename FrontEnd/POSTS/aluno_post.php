<?php

$dados = array(
    'nome'=>$_POST['nome'],
    'email'=>$_POST['email'],
    'endereco'=>$_POST['endereco']
);

$dados_json = json_encode($dados);

//print_r($dados_json);
/* Cabeçalho */
$url       = 'http://localhost:8000/alunos';
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$ch = curl_init();
/* Request */
curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $dados_json);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,           true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');
$resposta = curl_exec($ch);
curl_close($ch);
