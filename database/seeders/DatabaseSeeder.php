<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
		/*$this->call(AdminSeeder::class);*/
		$this->call(UserSeeder::class);
		$this->call(CategorySeeder::class);
		$this->call(ProductSeeder::class);
		$this->call(OrderSeeder::class);
		$this->call(AboutSeeder::class);
		$this->call(WelcomeSeeder::class);
		$this->call(VideoSeeder::class);
		$this->call(BlogSeeder::class);
		
    }
}
