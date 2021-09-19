<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
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
            //
	"title"=>$this->faker->sentence,
	"slug"=>Str::slug($this->faker->sentence),
	"description"=>$this->faker->paragraph,
	"price"=>$this->faker->numberBetween($min=100,$max=900),
	"old_price"=>$this->faker->numberBetween($min=100,$max=900),
	"inStock"=>$this->faker->numberBetween($min=1,$height=10),
	"image"=>$this->faker->imageUrl($width=640,$height=480),
	"category_id"=>Category::factory()->create()->id,
        ];
    }
}
