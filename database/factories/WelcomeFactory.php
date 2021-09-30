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
			'intro'=>$this->sentence,
			'descri'=>$this->sentence,
			'introduction'=>$this->sentence,
			'descript'=>$this->sentence,
			'description'=>$this->sentence,
			'slider'=>$this->imageUrl($width=1920,$height=1080),
			"header"=>$this->sentence,
			"describe"=>$this->sentence,
			"described"=>$this->sentence,
			"image"=>$this->imageUrl($width=300,$height=300),
			"button"=>$this->sentence,
			"btn"=>$this->sentence,
        ];
    }
}
