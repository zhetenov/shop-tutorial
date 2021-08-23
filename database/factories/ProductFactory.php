<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'      => $this->faker->unique()->name(),
            'description'=> $this->faker->word(),
            'image_url'  => 'https://via.placeholder.com/300x300',
            'category_id'=> $this->faker->numberBetween(1,5)
        ];
    }
}
