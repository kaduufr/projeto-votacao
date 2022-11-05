<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PollFactory extends Factory
{

  /**
   * @return array
   */
  public function definition(): array
  {
    return [
      'name_mate' => $this->faker->name,
      'cod_mate' => $this->faker->randomDigitNotNull(),
      'name_syndic' => $this->faker->name,
      'cpf_syndic' => $this->faker->numerify('###########'),
      'name_subsyndic' => $this->faker->name,
      'cpf_subsyndic' => $this->faker->numerify('###########'),
    ];
  }
}
