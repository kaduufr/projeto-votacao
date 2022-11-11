<?php

namespace App\Services\Interfaces;
use Illuminate\Database\Eloquent\Collection;

interface EleicaoServiceInterface {

  public function create(array $request);

  public function get(int $id): Collection;

  public function create_voto(array $request);

}
