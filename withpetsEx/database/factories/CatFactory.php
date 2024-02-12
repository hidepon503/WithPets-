<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cat;
use App\Models\Kind;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cat>
 */
class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //20件のデータを作成
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(0, 18),
            'kind_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 5),
            'desc' => $this->faker->text(200),
        ];
    }
}




