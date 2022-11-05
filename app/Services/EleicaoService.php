<?php

namespace App\Services;

use App\Models\Eleicao;
use App\Services\Interfaces\ChapaServiceInterface;
use App\Services\Interfaces\EleicaoServiceInterface;

class EleicaoService implements EleicaoServiceInterface
{
  public function __construct(
    private ChapaServiceInterface $chapa_service
  )
  {
  }

  public function create(array $request)
  {
    $votacao = Eleicao::create();
    $this->chapa_service->createMany($request, $votacao->id);
  }

}
