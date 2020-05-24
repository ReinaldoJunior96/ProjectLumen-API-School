<?php
$campos = array(
    "nome" => "reinaldo",
    "email" => "reinaldojr@gmail.com",
    "endereco" => "reinaldo mora na pqp"
);

json_encode($campos);






$url       = 'http://localhost:8000/alunos/17';
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,           true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');

$resposta = curl_exec($ch);

curl_close($ch);









print($resposta);