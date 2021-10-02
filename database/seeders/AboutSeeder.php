<?php

namespace Database\Seeders;
use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		About::factory()->count(1)->create();
    }
}
