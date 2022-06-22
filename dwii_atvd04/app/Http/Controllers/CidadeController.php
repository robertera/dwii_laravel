<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $cidade = [[
        'id' => 1,
        'cidade' => 'Curitiba',
        'porte' => 'grande'
        ]];

    public function __construct() {
        // obtém o conteúdo da variável de sessão "cidade"
        $aux = session('cidade');
        // verifica se a sessão já estava setada
        if(!isset($aux)) {
        // seta a sessão "cidade" com o array
        session(['cidade' => $this->cidade]);
        }
    }


    
    public function index()
    {
        $cidade = session('cidade');
        return view('cidade.index', compact('cidade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // obtém os dados da sessão "cidade"
        $aux = session('cidade');
    // retorna um array contendo apenas os dados da coluna "id"
        $ids = array_column($aux, 'id');
    // verifica o total de elementos do array "id"
        if(count($ids) > 0) {
    // obtém o valor máximo do array "id" + 1
        $new_id = max($ids) + 1;
    }
    else {
    // configura novo id com 1
        $new_id = 1;
        }
    }

    // Array com os dados do novo cadastro
        $novo = [
        'id' => $new_id,
        'cidade' => $request->cidade,
        'porte' => $request->porte
        ];
    // Insere novo cadastro no array
        array_push($aux, $novo);
    // Atualiza a sessão com o novo cadastro
        session(['cidade' => $aux]);
    // redireciona para lista de cidade
        return redirect()->route('cidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
