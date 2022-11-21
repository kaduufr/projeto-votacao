<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ChapaServiceInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ChapaController extends Controller
{

  public function __construct(
    private ChapaServiceInterface $chapa_service
  )
  {
  }

  public function index()
  {
    $chapas = $this->chapa_service->getAll();
    return view('chapas.index', ['chapas' => $chapas]);
  }

  public function show($id)
  {
    $chapa = $this->chapa_service->get($id);
    return view('chapas.show', ['chapa' => $chapa]);
  }

  public function edit($id)
  {
    $chapa = $this->chapa_service->get($id);
    return view('chapas.edit', ['chapa' => $chapa]);
  }

  public function update(Request $request)
  {
    $this->chapa_service->update($request->all());
    Alert::success('Chapa atualizada com sucesso!');
    return redirect()->route('chapas_index')->with('success', 'Chapa removida com sucesso.');
  }

  public function destroy($id)
  {
    $this->chapa_service->delete($id);
    Alert::success('Chapa removida com sucesso!');
    return redirect()->route('chapas_index');
  }
}
