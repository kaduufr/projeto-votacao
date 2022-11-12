<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface EleicaoServiceInterface {

  public function create(array $request);

  public function get(int $id): object;

  public function create_voto(array $request);

  public function getAll(): Collection;
}
