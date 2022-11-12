<?php

namespace App\Http\Controllers;

use App\Models\Eleicao;
use App\Services\Interfaces\EleicaoServiceInterface;

class AppController extends Controller
{
  public function __construct(
    private EleicaoServiceInterface $eleicao_service,
  ) {}
    function index()
    {
      $eleicoes = $this->eleicao_service->getAll();
      return view('home', ['eleicoes' => $eleicoes]);
    }
}
