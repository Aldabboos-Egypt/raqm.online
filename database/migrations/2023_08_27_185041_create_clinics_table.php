<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('clinic_id');
            $table->text('url')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('category_name')->nullable();
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('street')->nullable();
            $table->integer('city_id')->nullable()->index('city_id');
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('country_code')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_unformatted')->nullable();
            $table->tinyInteger('claim_this_business')->nullable();
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->string('location_name')->nullable();
            $table->decimal('total_score')->nullable();
            $table->tinyInteger('permanently_closed')->nullable();
            $table->tinyInteger('temporarily_closed')->nullable();
            $table->string('place_id')->nullable();
            $table->integer('reviews_count')->nullable();
            $table->integer('reviews_one_star')->nullable();
            $table->integer('reviews_two_star')->nullable();
            $table->integer('reviews_three_star')->nullable();
            $table->integer('reviews_four_star')->nullable();
            $table->integer('reviews_five_star')->nullable();
            $table->integer('images_count')->nullable();
            $table->date('scraped_at')->nullable();
            $table->string('reserve_table_url')->nullable();
            $table->string('google_food_url')->nullable();
            $table->integer('hotel_stars')->nullable();
            $table->text('hotel_description')->nullable();
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->text('similar_hotels_nearby')->nullable();
            $table->text('opening_hours')->nullable();
            $table->text('amenities')->nullable();
            $table->tinyInteger('accepts_new_patients')->nullable();

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
        Schema::dropIfExists('clinics');
    }
}
