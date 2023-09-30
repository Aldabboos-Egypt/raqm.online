<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplealsosearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoplealsosearch', function (Blueprint $table) {
            $table->integer('search_id')->index('search_id');
            $table->string('related_category')->nullable();
            $table->string('related_title')->nullable();
            $table->integer('related_reviews_count')->nullable();
            $table->decimal('related_total_score', 5, 2)->nullable();
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
        Schema::dropIfExists('peoplealsosearches');
    }
}
