<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\EleicaoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EleicaoController extends Controller
{
  public function __construct(
    private EleicaoServiceInterface $eleicao_service
  ) {}

  function new(): View
  {
    return view('new');
  }

  function create(Request $request)
  {
    $this->eleicao_service->create($request->all());

    return redirect()->route('home')
      ->with('success', 'Poll created successfully.');
  }

  function show($id)
  {
    [$dados_eleicao] = $this->eleicao_service->get($id);
    return view('resumo', ['eleicao' => $dados_eleicao]);
  }
}
