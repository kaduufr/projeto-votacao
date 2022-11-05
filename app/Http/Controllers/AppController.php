<?php

namespace App\Http\Controllers;

use App\Models\Eleicao;

class AppController extends Controller
{
    function index()
    {
      $polls = Eleicao::query()->where('ativa', true)->get();
      return view('home', ['polls' => $polls]);
    }
}
