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
            $table->string('title','140');
            $table->string('sku','140');
            $table->decimal('default_price')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->boolean('is_physical')->default(true);
            $table->boolean('is_digital')->default(false);;
            $table->boolean('product_for_sale')->default(false);;
            $table->text('product_for_list')->default(false);;
            $table->boolean('product_description')->default(false);;

            $table->unsignedBigInteger('added_by')->nullable();
            $table->boolean('is_submitted')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete("cascade");

            $table->foreign('added_by')->references('id')
                ->on('users')->onDelete("cascade");
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
