<?php

namespace App\Http\Controllers;

use App\Models\Votacao;
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



        return redirect()->route('home')
          ->with('success', 'Poll created successfully.');
    }
}
