<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\EleicaoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EleicaoController extends Controller
{
  public function __construct(
    private EleicaoServiceInterface $votacao_service
  )
  {

  }
  function new(): View
  {
    return view('new');
  }

  function create(Request $request)
  {
    $this->votacao_service->create($request->all());

        return redirect()->route('home')
          ->with('success', 'Poll created successfully.');
    }
}
