<?php

namespace App\Services;

use App\Models\Eleicao;
use App\Services\Interfaces\ChapaServiceInterface;
use App\Services\Interfaces\EleicaoServiceInterface;
use App\Services\Interfaces\VotoServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class EleicaoService implements EleicaoServiceInterface
{
  public function __construct(
    private ChapaServiceInterface $chapa_service,
    private VotoServiceInterface $voto_service
  )
  {
  }

  public function create(array $request)
  {
    $eleicao = Eleicao::create();
    $this->chapa_service->createMany($request, $eleicao->id);
  }

  public function create_voto(array $request)
  {
    $this->voto_service->create($request);
  }

  public function get(int $id): Collection
  {
    return Eleicao::query()->where('id', $id)->with('chapas')->get();
  }
}
