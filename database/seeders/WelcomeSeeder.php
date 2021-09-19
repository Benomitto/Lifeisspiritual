<?php

namespace Database\Seeders;
use App\Models\Welcome;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class WelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		Welcome::factory()->count(1)->create();
    }
}
