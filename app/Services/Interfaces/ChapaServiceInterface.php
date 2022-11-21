<?php

namespace App\Services\Interfaces;

interface ChapaServiceInterface{

  public function createMany(array $chapas, int $votacao);

  public function getAll();
}
