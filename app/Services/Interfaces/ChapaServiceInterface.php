<?php

namespace App\Services\Interfaces;

interface ChapaServiceInterface{

  public function createMany(array $chapas, int $votacao);

  public function getAll();

  public function get(int $id): object;

  public function update(array $request);

  public function delete(int $id);
}
