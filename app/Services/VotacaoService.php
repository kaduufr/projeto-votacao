<?php

namespace App\Services;

use App\Models\Votacao;
use App\Services\Interfaces\ChapaServiceInterface;
use App\Services\Interfaces\VotacaoServiceInterface;

class VotacaoService implements VotacaoServiceInterface
{
  public function __construct(
    private ChapaServiceInterface $chapa_service
  )
  {
  }

  public function create(array $request)
  {
    $votacao = Votacao::create();
    $this->chapa_service->createMany($request, $votacao->id);
  }

}
