<?php

namespace App\Http\Controllers;

use App\Models\Votacao;

class AppController extends Controller
{
    function index()
    {
      $polls = Votacao::query()->where('ativa', true)->get();
      return view('home', ['polls' => $polls]);
    }
}
