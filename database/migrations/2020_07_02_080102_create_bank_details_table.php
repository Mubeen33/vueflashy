<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('account_holder','130');
            $table->string('account_name','130')->nullable();
            $table->string('bank_name','130');
            $table->string('branch_name','130')->nullable();
            $table->string('branch_code','130')->nullable();
            $table->string('bank_address','130')->nullable();
            $table->string('account_number','130')->nullable();
            $table->string('bank_docs','190')->nullable();
            $table->text('business_description')->nullable();
            $table->unsignedBigInteger('vendor_id');

            $table->foreign('vendor_id')->references('id')
                ->on('vendors')->onDelete('cascade');
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
        Schema::dropIfExists('bank_details');
    }
}
