<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_requests', function (Blueprint $table) {
            $table->id();
            $table->string('first_name','90');
            $table->string('last_name','90');
            $table->string('email','120');
            $table->string('phone_number','30')->nullable();
            $table->string('cell_contact','30')->nullable();
            $table->string('company_name','90')->nullable();
            $table->string('web_url','190')->nullable();

            $table->string('owner_info','191')->nullable();
            $table->string('owner_first_name','90')->nullable();
            $table->string('owner_last_name','90')->nullable();

            $table->text('business_description')->nullable();
            $table->boolean('is_vat_registered')->default(false);
            $table->boolean('is_physical_store')->default(false);
            $table->string('total_products','100');
            $table->string('other_info','100');

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
        Schema::dropIfExists('seller_requests');
    }
}
