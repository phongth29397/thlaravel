<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_image_intro')->nullable();
            $table->integer('publish');
            $table->integer('new');
            $table->string('S');
            $table->string('M');
            $table->string('L');
            $table->string('XL');
            $table->string('XXL');
            $table->string('total_size');
            $table->integer('category_id');
            $table->integer('category_lever1');
            $table->integer('ordering');
            $table->float('price');
            $table->float('sale_price')->nullable();
            $table->text('description');
            $table->text('full_description');
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
