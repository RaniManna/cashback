<?php

namespace Database\Factories;

use App\Models\CashbackCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;


class CashbackCouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CashbackCoupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'title' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'category_id' => $this->faker->numberBetween(0, 999),
            'branch_id' => $this->faker->numberBetween(0, 999),
            'cashback_percentage' => $this->faker->numberBetween(0, 9223372036854775807),
            'cashback_percentage_sys' => $this->faker->numberBetween(0, 9223372036854775807),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
