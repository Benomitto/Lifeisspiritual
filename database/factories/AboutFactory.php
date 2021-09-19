<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class AboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = About::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
			
			'title'=>$this->faker->sentence,
			"image"=>$this->faker->imageUrl($width=500,$height=500),
			"description"=>$this->faker->paragraph,
			"sentence"=>$this->faker->sentence,
			"photo"=>$this->faker->imageUrl($width=500,$height=500),
			"paragraph"=>$this->faker->paragraph,
			"segment"=>$this->faker->sentence,
        ];	
    }
}
