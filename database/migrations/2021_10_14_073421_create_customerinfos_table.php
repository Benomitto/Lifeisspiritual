<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerinfos', function (Blueprint $table) {
            $table->id();
			$table->string('email')->unique();
			$table->string('name')->nullable;
			$table->string('zipcode')->unique();
			$table->string('city')->unique();
			$table->string('state')->unique();
			$table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customerinfos');
    }
}
