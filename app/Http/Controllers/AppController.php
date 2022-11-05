<?php

namespace App\Http\Controllers;

use App\Models\Eleicao;

class AppController extends Controller
{
    function index()
    {
      $eleicoes = Eleicao::query()->where('ativa', true)->with('chapas')->get();
      return view('home', ['eleicoes' => $eleicoes]);
    }
}
