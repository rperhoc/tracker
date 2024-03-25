<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tags = ['fruit', 'low carb', 'vegetable', 'vegan', 'vegetarian'];
        
        return [
            'name' => $this->faker->unique()->word,
            'kcal' => $this->faker->numberBetween(50, 1000),
            'protein' => $this->faker->numberBetween(1, 100),
            'fat' => $this->faker->numberBetween(1, 100),
            'carbs' => $this->faker->numberBetween(1, 100),
            'micronutrients' => json_encode([
                'vitaminA' => $this->faker->numberBetween(0, 100),
                'vitaminC' => $this->faker->numberBetween(0, 100),
            ]),
            'tags' => json_encode($this->faker->randomElements($tags, $this->faker->numberBetween(0, count($tags))))
        ];
    }
}
