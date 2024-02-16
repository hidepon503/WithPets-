<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cat;



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
            'name' => $this->faker->firstName,
            'user_id' => $this->faker->numberBetween(1, 30),
            'age' => $this->faker->numberBetween(0, 18),
            'kind_id' => $this->faker->numberBetween(1, 5),
            'status_id' => $this->faker->numberBetween(1, 2),
            'gender_id' => $this->faker->numberBetween(1, 2),
            'desc' => $this->faker->text(200),
            // imageカラムには、storage/app/public/sampleCatsディレクトリにある画像ファイルのパスをランダムに設定
            'image' => 'sampleCats/' . $this->faker->randomElement(['cat1.jpg', 'cat2.jpg', 'cat3.jpg', 'cat4.jpg', 'cat5.jpg']),
        ];
    }
}




