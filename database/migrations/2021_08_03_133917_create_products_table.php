<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('title');
			$table->string('image');
			$table->string('slug',191)->unique();
			$table->text('description');
			$table->text('quantity');
			$table->text('price',8,2)->nullable;
			$table->text('old_price',8,2)->nullable;
			$table->integer('inStock')->default(0);
			$table->unsignedBigInteger('category_id');
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
        Schema::dropIfExists('products');
    }
}
