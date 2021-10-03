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
			
			'header'=>$this->sentence,
			"describe"=>$this->sentence,
			"described"=>$this->sentence,
			"image"=>$this->imageUrl($width=500,$height=500),
			"button"=>$this->sentence,
        ];	
    }
}
