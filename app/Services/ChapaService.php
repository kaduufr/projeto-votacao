<?php

namespace App\Services;

use App\Models\Chapa;
use App\Models\Eleicao;
use App\Services\Interfaces\ChapaServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ChapaService implements ChapaServiceInterface
{
  public function createMany(array $chapas, int $votacao)
  {
    $eleicao = Eleicao::query()->where('id', $votacao)->first();
    if (isset($chapas['chapas'])) {
      $chapasExistentes = $chapas['chapas'];
      foreach ($chapasExistentes as $chapaId) {
        $chapaSelectec = Chapa::where('id', $chapaId)->first();
        $chapaSelectec->eleicao()->attach($eleicao);
      }
    }

    if (isset($chapas['nome_chapa'])) {
      $chapasLength = count($chapas['nome_chapa']);

      for ($i = 0; $i < $chapasLength; $i++) {
        $chapa = new Chapa();
        $chapa->nome_chapa = $chapas['nome_chapa'][$i];
        $chapa->cod_chapa = $chapas['cod_chapa'][$i];
        $chapa->nome_sindico = $chapas['nome_sindico'][$i];
        $chapa->cpf_sindico = $chapas['cpf_sindico'][$i];
        $chapa->nome_subsindico = $chapas['nome_subsindico'][$i];
        $chapa->cpf_subsindico = $chapas['cpf_subsindico'][$i];

        $chapa->save();

        $chapa->eleicao()->attach($eleicao);
      }

    }
  }

  public function getAll(): Collection
  {
    return Chapa::all();
  }
}
