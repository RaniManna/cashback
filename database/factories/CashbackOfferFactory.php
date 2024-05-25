<?php

namespace Database\Factories;

use App\Models\CashbackOffer;
use Illuminate\Database\Eloquent\Factories\Factory;


class CashbackOfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CashbackOffer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'category_id' => $this->faker->numberBetween(0, 999),
            'branch_id' => $this->faker->numberBetween(0, 999),
            'Title' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'description' => $this->faker->text(500),
            'image' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'points' => $this->faker->numberBetween(0, 9223372036854775807),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
