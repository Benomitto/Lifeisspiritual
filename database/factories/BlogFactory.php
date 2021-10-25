<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
			'image'=>$this->imageUrl($width=945,$height=630),
			'title'=>$this->sentence,
			'month'=>$this->dateTimeThisMonth()->format('m-d-Y'),
			'description'=>$this->sentence,
			"slug"=>Str::slug($this->sentence),
			'body'=>$this->sentence,
			'writer'=>$this->sentence
        ];
    }
}
