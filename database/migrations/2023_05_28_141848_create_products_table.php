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
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->integer('product_category_id')->default(0);
            $table->text('description')->nullable();
            $table->float('price')->nullable()->default(0);
            $table->integer('width')->nullable()->default(0);
            $table->integer('height')->nullable()->default(0);
            $table->integer('wide')->nullable()->default(0);
            $table->string('meta_keywords', 255)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->text('image')->nullable();
            $table->boolean('status')->default(1);
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
