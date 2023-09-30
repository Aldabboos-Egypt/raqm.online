<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchhistory', function (Blueprint $table) {
            $table->increments('search_id');
            $table->integer('user_id')->nullable()->index('user_id');
            $table->string('search_string');
            $table->integer('rank')->nullable();
            $table->string('search_page_url')->nullable();
            $table->string('search_page_loaded_url')->nullable();
            $table->tinyInteger('is_advertisement')->nullable();
            $table->timestamp('search_timestamp');
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
        Schema::dropIfExists('searchhistories');
    }
}
