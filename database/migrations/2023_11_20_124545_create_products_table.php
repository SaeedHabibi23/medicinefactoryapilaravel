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
            $table->bigIncrements('product_id')->id()->unsigned();

            $table->string('product_name' , 64);
            $table->string('ExpireDate' , 64);
            $table->string('company_name' , 64);
            $table->string('country_name' , 64);
            $table->integer('NumberCarton');
            $table->integer('NumberFiCarton');
            $table->integer('Total');
            $table->integer('PriceBuy');
             $table->integer('PriceSell'); 
             $table->unsignedBigInteger('cat_id')->nullable();
             $table->foreign('cat_id')->references('cat_id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
             
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
