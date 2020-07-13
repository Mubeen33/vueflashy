<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_media', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('variation_option_id');
            $table->timestamps();

            $table->foreign('variation_option_id')->references('id')
                ->on('variation_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_media');
    }
}
