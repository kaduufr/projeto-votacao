<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\EleicaoServiceInterface;
use App\Services\Interfaces\VotoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class VotoController extends Controller
{

  public function __construct(
    private EleicaoServiceInterface $eleicao_service,
    private VotoServiceInterface $voto_service
  ){}

  function new($id): View
  {
    [$dados_eleicao] = $this->eleicao_service->get($id);
    return view('voto.new', ['eleicao' => $dados_eleicao]);
  }

  function create(Request $request)
  {
    try {
      $this->voto_service->create($request->all());
      Alert::success('Success', 'Voto computado com sucesso!!');
      return redirect()->route('show_eleicao', $request->eleicao);
    } catch (\Exception $e) {
      return redirect()->back();
    }
  }
}
