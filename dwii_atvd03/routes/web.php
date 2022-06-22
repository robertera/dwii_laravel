<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return "<h1>Rota Principal</h2>";
});

function alunos()
{
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
Route::get('/aluno', function () {
    $alunos =  "<ul>
    <li>Bruno Zorba</li>
    <li>Hideki Zorba</li>
    <li>Italo Zorba</li>
    <li>Roberto Zorba</li>
    <li>Botafogo botafogo</li>
    </ul>";

    return $alunos;
})->name('alunos');

//Numero 2
Route::get('/aluno/limite/{limite}', function ($limite) {

    $alunos = "<ul>";
    if (preg_match('/^[1-9][0-9]*$/', $limite)) {
        $dados = alunos();

        if ($limite <= count($dados) && $limite > 0) {
            $count = 0;

            foreach ($dados as $chave => $aux) {
                if ($count < $limite) {
                    $alunos .= "<li>" . $chave . "-" . $dados[$chave]['nome'] . "</li>";
                }
                $count++;
            }
        } else {
            $alunos .= "<li>Numero maximo de " . count($dados) . " matriculas</li>";
        }
    } else {
        $alunos .= "<li>O valor não é inteiro</li>";
    }
    return $alunos;
});

//Numero 3
Route::get('/aluno/matricula/{matricula}', function ($matricula) {
    $alunos = "<ul>";
    $dados = alunos();


    if ($matricula < 1 || $matricula > count($dados)) {
        $alunos .= "Matricula não encontrada!";
    } else {
        foreach ($dados as $chave => $aux) {
            if ($matricula == $chave) {
                $alunos .= "<li>" . $chave . "-" . $aux['nome'] . "</li>";
            }
        }
    }

    $alunos .= "</ul>";

    return $alunos;
});

//Numero 4
Route::get('/aluno/nome/{nome}', function ($nome) {
    $aluno = "<ul>";
    $dados = alunos();

    foreach ($dados as $chave => $aux) {
        foreach ($aux as $name => $valor) {
            if (trim($name) == "nome") {
                if (trim($valor) == trim($nome)) {
                    $aluno .= "<li>" . $chave . "-" . $nome . "</li>";
                    break;
                }
            }
        }
    }

    if (trim($aluno) == "<ul>") {
        $aluno .= "<li>NÃO ENCONTRADO</li>";
    }

    $aluno .= "</ul>";
    return $aluno;
});

//Numero 5
Route::get('/nota', function () {
    $alunos = "<ul>";
    $dados = alunos();

    $alunos = "<table> <th> Matricula </th> <th> Aluno </th> <th> Nota </th> <tbody align = center>";

    foreach ($dados as $chave => $aux) {
        $alunos .= "<tr><td>" . $chave . "</td>";
        foreach ($aux as $chave => $valor) {
            $alunos .= "<td>" . $valor . "</td>";
        }
        $alunos .= "<tr>";
    }
    $alunos .= "</tbody>";

    $alunos .= "</ul>";
    return $alunos;
});

//Numero 6
Route::get('/nota/limite/{limite}', function ($limite) {
    $alunos = "<ul>";
    if (preg_match('/^[1-9][0-9]*$/', $limite)) {
        $dados = alunos();

        $alunos = "<table> <th> Matricula </th> <th> Aluno </th> <th> Nota </th> <tbody align = center>";


        if ($limite <= count($dados) && $limite > 0) {
            $count = 0;
            foreach ($dados as $chave => $aux) {
                if ($count < $limite) {
                    $alunos .= "<tr><td>" . $chave . "</td>";
                    foreach ($aux as $chave => $valor) {
                        $alunos .= "<td>" . $valor . "</td>";
                    }
                    $alunos .= "<tr>";
                }
                $count++;
            }
            $alunos .= "</tbody>";
        } else {
            $alunos = "<font color = red><big><b> Numero Maximo invalido! </b></font></big>";
        }
    } else {
        $alunos = "<font color = red><big><b> Digite um valor inteiro! </b></font></big>";
    }

    $alunos .= "</ul>";
    return $alunos;
});

//Numero 7 com nota
Route::get('/nota/lancar/{nota}/{matricula}/{nome}', function ($nota, $matricula, $nome = null) {
    $dados = alunos();

    if (empty($nome)) {
        foreach ($dados as $valor => $aux) {
            if ($valor == $matricula) {
                $dados[$valor]['nota'] = $nota;
            }
        }
    } else {
        foreach ($dados as $valor => $aux) {
            if (trim($dados[$valor]['nome']) == trim($nome)) {
                $dados[$valor]['nota'] = $nota;
            }
        }
    }

    $alunos = "<table> <th> Matricula </th> <th> Aluno </th> <th> Nota </th> <tbody align = center>";

    foreach ($dados as $chave => $aux) {
        $alunos .= "<tr><td>" . $chave . "</td>";
        foreach ($aux as $chave => $valor) {
            $alunos .= "<td>" . $valor . "</td>";
        }
        $alunos .= "<tr>";
    }
    $alunos .= "</tbody>";

    return $alunos;
});

// Numero 7 com conceito
Route::get('/nota/conceito/{A}/{B}/{C}', function ($A, $B, $C) {
    $dados = alunos();

    foreach ($dados as $key => $value) {
        if ($dados[$key]['nota'] >= $A) {
            $dados[$key]['nota'] = 'A';
        } elseif ($dados[$key]['nota'] >= $B) {
            $dados[$key]['nota'] = 'B';
        } elseif ($dados[$key]['nota'] >= $C) {
            $dados[$key]['nota'] = 'C';
        } else {
            $dados[$key]['nota'] = 'D';
        }
    }

    var_dump($dados);

    $alunos = "<table> <th> Matricula </th> <th> Aluno </th> <th> Nota </th> <tbody align = center>";

    foreach ($dados as $chave => $aux) {
        $alunos .= "<tr><td>" . $chave . "</td>";
        foreach ($aux as $chave => $valor) {
            $alunos .= "<td>" . $valor . "</td>";
        }
        $alunos .= "<tr>";
    }
    $alunos .= "</tbody>";

    return $alunos;
});
