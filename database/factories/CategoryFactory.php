<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            $factory->define(\App\CategoryModel::class, function (Faker $faker) {
                return [
                    'name' => $faker->words(3, true)
                ];
            })
        ];
    }
}
