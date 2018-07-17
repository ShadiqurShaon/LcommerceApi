<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPhotosAndReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_photos_and_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_detail_id');
            $table->foreign('product_detail_id')
                ->references('id')->on('product_details')->onDelete('cascade');
            $table->string('photos');
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
        Schema::dropIfExists('product_photos_and_reviews');
    }
}
