<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
	"user_id"=>User::factory()->create()->id,
	"product_name"=>$this->faker->word,
	"qty"=>$this->faker->numberBetween($min=1,$height=10),
	"price"=>$this->faker->numberBetween($min=100,$max=900),
	"total"=>$this->faker->numberBetween($min=1000,$max=9000),
        ];
    }
}
