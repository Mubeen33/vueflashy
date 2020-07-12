<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_options', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_default')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('option_name','390');
            $table->string('stock_qty','40')->nullable();
            $table->string('image','190')->nullable();
            $table->decimal('selling_price')->nullable();
            $table->unsignedBigInteger('variation_id')->nullable();
            $table->timestamps();

            $table->foreign("variation_id")->references('id')
                ->on('variations')
                ->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variation_options');
    }
}
