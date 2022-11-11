<?php

namespace App\Services;

use App\Models\Voto;
use App\Services\Interfaces\VotoServiceInterface;
use RealRashid\SweetAlert\Facades\Alert;

class VotoService implements VotoServiceInterface
{

  /**
   * @throws \Exception
   */
  public function create(array $request)
  {
    $eleicaoId = $request['eleicao'];
    $chapaId = $request['chapa'];
    $bloco = $request['bloco'];
    $apartamento = $request['apartamento'];

    $votoExiste = $this->usuarioJaVotou($eleicaoId, $apartamento, $bloco);
    if ($votoExiste) {
      Alert::error('Error', 'Você já votou nessa eleição!!');
      throw new \Exception('Voto já computado');
    }

    $voto = new Voto();
    $voto->cod_eleicao = $eleicaoId;
    $voto->cod_chapa = $chapaId;
    $voto->bloco = $bloco;
    $voto->apartamento = $apartamento;
    $voto->save();

  }

  private function usuarioJaVotou($eleicaoId, $apartamento, $bloco)
  {
    return Voto::query()
      ->where('cod_eleicao', $eleicaoId)
      ->where('apartamento', $apartamento)
      ->where('bloco', $bloco)
      ->first();
  }
}
