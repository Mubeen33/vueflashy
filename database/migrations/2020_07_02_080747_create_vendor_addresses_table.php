<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('b_complete_address','190');
            $table->string('b_street_address','140')->nullable();
            $table->string('b_route','100')->nullable();
            $table->string('b_city','90')->nullable();
            $table->string('b_subrub','90')->nullable();
            $table->string('b_postal_code','50')->nullable();
            $table->string('b_country','50')->nullable();

            $table->string('w_complete_address','190');
            $table->string('w_street_address','140')->nullable();
            $table->string('w_route','100')->nullable();
            $table->string('w_city','90')->nullable();
            $table->string('w_subrub','90')->nullable();
            $table->string('w_postal_code','50')->nullable();
            $table->string('w_country','50')->nullable();

            $table->string('billing_complete_address','190');
            $table->string('billing_street_address','140')->nullable();
            $table->string('billing_route','100')->nullable();
            $table->string('billing_city','90')->nullable();
            $table->string('billing_subrub','90')->nullable();
            $table->string('billing_postal_code','50')->nullable();
            $table->string('billing_country','50')->nullable();

            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->timestamps();

            $table->foreign("vendor_id")->references('id')
                ->on('vendors')->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_addresses');
    }
}
