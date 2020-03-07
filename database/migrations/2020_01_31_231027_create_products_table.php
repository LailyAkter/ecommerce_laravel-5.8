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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('slug');
            $table->string('image');
            $table->text('short_desc');
            $table->float('price');
            $table->float('real_price');
            $table->float('sell_price');
            $table->integer('quantity')->default(0);
            $table->longText('full_desc');
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign("tag_id")->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign("brand_id")->references('id')->on('brands')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
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
