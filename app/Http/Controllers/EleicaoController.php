<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ChapaServiceInterface;
use App\Services\Interfaces\EleicaoServiceInterface;
use App\Services\Interfaces\VotoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class EleicaoController extends Controller
{
  public function __construct(
    private EleicaoServiceInterface $eleicao_service,
    private ChapaServiceInterface $chapa_service,
    private VotoServiceInterface $voto_service
  ) {}

  function new(): View
  {
    $chapas = $this->chapa_service->getAll();
    return view('new', ['chapas' => $chapas]);
  }

  function create(Request $request)
  {
    $this->eleicao_service->create($request->all());
    Alert::success('Eleição criada com sucesso!');
    return redirect()->route('home')
      ->with('success', 'Poll created successfully.');
  }

  function show($id)
  {
    $dados_eleicao = $this->eleicao_service->get($id);
    $votos = [];
    foreach ($dados_eleicao->chapas as $chapa) {
      $votos[$chapa->id] = $this->voto_service->getVotesByChapa($dados_eleicao->id,$chapa->id);
    }
    $total_votos = count($dados_eleicao->votos);
    foreach ($dados_eleicao->chapas as $chapa) {
      $chapa->votos = $votos[$chapa->id];
      if ($total_votos > 0) {
        $chapa->percentual = round((count($chapa->votos) * 100) / $total_votos, 2);
      } else {
        $chapa->percentual = 0;
      }
    }

    $vencedor = $dados_eleicao->chapas->sortByDesc('percentual')->first();
    return view('resumo', ['eleicao' => $dados_eleicao, 'total_votos' => $total_votos, 'vencedor' => $vencedor]);
  }
}
