<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
              $table->string('meta_title_ar')->nullable();
              $table->string('meta_title')->nullable();
              $table->text('meta_description_ar')->nullable();
              $table->text('meta_description')->nullable();
              $table->text('meta_keywords_ar')->nullable();
              $table->text('meta_keywords')->nullable();
              $table->string('url')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('meta_title_ar');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description_ar');
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keywords_ar');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('url');
        });
    }
}
