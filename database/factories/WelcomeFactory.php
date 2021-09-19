<?php

namespace Database\Factories;

use App\Models\Welcome;
use Illuminate\Database\Eloquent\Factories\Factory;

class WelcomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Welcome::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
			'intro'=>$this->faker->sentence,
			'descri'=>$this->faker->sentence,
			'introduction'=>$this->faker->sentence,
			'descript'=>$this->faker->sentence,
			'description'=>$this->faker->sentence,
			'slider'=>$this->faker->imageUrl($width=1920,$height=1080),
			"header"=>$this->faker->sentence,
			"describe"=>$this->faker->sentence,
			"described"=>$this->faker->sentence,
			"image"=>$this->faker->imageUrl($width=300,$height=300),
			"button"=>$this->faker->sentence,
			"btn"=>$this->faker->sentence,
        ];
    }
}
