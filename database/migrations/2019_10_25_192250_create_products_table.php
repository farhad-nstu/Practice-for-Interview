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
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->integer('buying_price');
            $table->integer('selling_price');
            $table->string('picture')->nullable();
            $table->integer('category_id');
            $table->integer('sub_category_id');

            // $table->bigInteger('category_id')->unsigned()->nullable();
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->bigInteger('sub_category_id')->unsigned()->nullable();
            // $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();

            
            // foreign key declare korte gele amader age jei table er key foreign key hisebe use korbo take migrate kore felte hobe then amra oi table er id ke foreign key hisebe nie ante parbo
            



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
