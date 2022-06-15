<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return "<h1>Rota Principal</h2>";
});

function alunos(){
    $dados = array(
        "1" => array(
            'nome' => "Bruno Zorba",
            'nota' => "10"
        ),

        "2" => array(
            'nome' => "Hideki Zorba",
            'nota' => "9"
        ),

        "3" => array(
            'nome' => "Italo Zorba",
            'nota' => "5"
        ),

        "4" => array(
            'nome' => "Roberto Zorba",
            'nota' => "5"
        ),

        "5" => array(
            'nome' => "Botafogo Botafogo",
            'nota' => "5"
        )
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
    if(preg_match('/^[1-9][0-9]*$/', $total)){
    $dados = alunos();
    
    if($total <= count($dados) && $total > 0){
        $count = 0;
        
    foreach($dados as $chave => $aux){
        if($count < $total){
            $alunos .= "<li>".$chave."-".$dados[$chave]['nome']."</li>";
            }
        $count++;
        }
    } else {
    $alunos .= "<li>Numero maximo de ".count($dados)." matriculas</li>";
    }                                                                                
} else {
    $alunos .= "<li>O valor não é inteiro</li>";
    }
    return $alunos;
});

//Numero 3
Route::get('/alunos/matricula/{matricula}', function($matricula){
    $alunos = "<ul>";
    $dados = alunos();
    

    if($matricula < 1 || $matricula > count($dados)){
        $alunos .= "Matricula não encontrada!";
    } else {
        foreach($dados as $chave => $mat){
            if($matricula == $chave){
                $alunos .= "<li>".$chave."-".$mat['nome']."</li>";
                }
        }
    }

    $alunos .= "</ul>";

    return $alunos;
});

//Numero 4
Route::get('/aluno/nome/{nome}', function($nome){
    $aluno = "<ul>";
    $dados = alunos();

    foreach($dados as $chave => $aux){
        foreach($aux as $name => $valor){
            if(trim($name) == "nome"){
                if(trim ($valor) == trim($nome)){
                    $aluno .= "<li>".$chave."-". $nome . "</li>";
                    break;
                }
            }
        }
    }

    if (trim($aluno) == "<ul>") {
        $aluno .= "<li>NÃO ENCONTRADO</li>";
    }

    return $aluno;
});

