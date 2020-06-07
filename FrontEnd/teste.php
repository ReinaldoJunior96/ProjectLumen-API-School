<?php
/* 
    Interações medicamento 1 : 1-2, 1-4, 1-55, 1-8, 1-14

    1-2 = resultado1-2,
    1-4 = resultado1-4,
    1-55 = resutlado1-55

    $var = Med::find(1)->mix;
    
    Json:
    {
        "id":"",
        "medi1":"1",
        "medi2":"2",
        "Interação": "Alguma interação entre os medicamentos"
    }
    {
        "id":"",
        "medi1":"1",
        "medi2":"4",
        "Interação": "Alguma interação entre os medicamentos"
    }
    ...
*/
$request = array(1, 2, 4, 5, 55); /* tbl_medicamentos */
$qtde = count($request);
$result = array();
// $result_json = json_encode($result);
// print_r($result_json);
// for ($i = 0; $i < $qtde; $i++) :
//     for ($j = 0; $j < $qtde1; $j++) :
//         if ($db[$i] == 1 and $db[$j] == 2) :
//             echo "interacao encontrada: " . "medicamento-1: " . $db[$i] . " mediamento-2: " . $db[$j] . "<br>";
//         elseif ($db[$i] == 1 and $db[$j] == 4) :
//             echo "interacao encontrada: " . "medicamento-1: " . $db[$i] . " mediamento-2: " . $db[$j] . "<br>";
//         elseif ($db[$i] == 1 and $db[$j] == 9) :
//             echo "interacao encontrada: " . "medicamento-1: " . $db[$i] . " mediamento-2: " . $db[$j] . "<br>";
//         endif;
//     endfor;
// endfor;


$interacoes_encontrada = array(
    array('medi1' => "2",'med2' =>"1",'description' => "asda"),
    array('medi1' => "3",'med2' =>"2",'description' => "asaasdasda"),
    array('medi1' => "4",'med2' =>"3",'description' => "asdasdasd"),
);

array_push($interacoes_encontrada, array('medi1' => "33",'med2' =>"44",'description' => "cancer"));


$a = json_encode($interacoes_encontrada);

$resposta = json_decode($a);

foreach($resposta as $v):
    echo "<pre>";
    print_r("Os medicamentos: ". $v->medi1. " + " . $v->med2. " = " . $v->description );
    echo "</pre>";
endforeach;





/*
    forearch($dados as $v)                                                                med1 = 1 / med2 = 2             
        for(i=0; i<qtde; i++)                                                             i = 1 / i = 1
            for(j=0; j<qtde; j++)                                                         j = 1 / i = 2
                if( $arr_request[$i] == $v->med1 AND $arr_request[$j] == $v->med2 )       
                1 - Interação Encontrada
                2 - Interação Encontrada
                3 - Interação Encontrada






*/