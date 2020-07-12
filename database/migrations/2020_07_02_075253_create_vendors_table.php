<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name','130');
            $table->string('last_name','130');
            $table->string('mobile_num','130')->nullable();
            $table->string('phone_number','130')->nullable();
            $table->string('display_name','130')->nullable();
            $table->string('legal_name','130')->nullable();
            $table->string('reg_num','130')->nullable();
            $table->string('VAT_num','130')->nullable();
            $table->string('email','130');
            $table->string('role','130')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('business_contact')->nullable();
            $table->text('business_description')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();


            $table->boolean("physical_products")->default(true);
            $table->boolean("digital_products")->default(false);

            $table->boolean("product_for_sale")->default(true);
            $table->boolean("add_priceless_products")->default(false);
            $table->boolean("add_ordinary_products")->default(false);

            $table->foreign('added_by')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('vendors');
    }
}
