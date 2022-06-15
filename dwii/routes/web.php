<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return "<h1>Rota Principal</h2>";
});

function dados(){
    $dados = array(
        "1" => array(
            'nome' => "Bruno Zorba",
            'nota' => "10"
        ),
        "Hideki Zorba",
        "Italo Zorba",
        "Roberto Zorba",
        "Botafogo Botafogo"
    );
    return $dados;
}

//Numero 1
Route::get('/alunos', function () {
    $alunos =  "<ul>
    <li>Bruno Zorba</li>
    <li>Hideki Zorba</li>
    <li>Italo Zorba</li>
    <li>Roberto Zorba</li>
    <li>Botafogo botafogo</li>
    </ul>";

    return $alunos;
})-> name('alunos');

//Numero 2
Route::get('/alunos/limite/{total}', function($total){



    $alunos = "<ul>";

    if($total <= count($dados)) {
        $cont = 0;
        foreach($dados as $nome) {
            $alunos .= "<li>$nome</li>";
            $cont++;
            if($cont >= $total) break;
        }
    }
    else {
        $alunos = $alunos."<li>Tamanho Máximo = ".count($dados)."</li>";
    }

    $alunos .= "</ul>";

    return $alunos;
});

//Numero 3
Route::get('/alunos/matricula/{matricula}', function($total, $matricula){

    

    return $alunos;
});

