<?php

namespace App\Services\Interfaces;
interface VotoServiceInterface {

  public function create(array $request);
  public function getVotesByChapa($eleicaoId, $chapaId);

}
