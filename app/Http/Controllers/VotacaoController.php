<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\VotacaoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VotacaoController extends Controller
{
  function new(): View
  {
    return view('poll.new');
  }

  function create(Request $request)
  {
    $this->votacao_service->create($request->all());

        return redirect()->route('home')
          ->with('success', 'Poll created successfully.');
    }
}
