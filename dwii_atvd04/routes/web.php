<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cidades', 301);

Route::resource('cidades', 'CidadeController');
