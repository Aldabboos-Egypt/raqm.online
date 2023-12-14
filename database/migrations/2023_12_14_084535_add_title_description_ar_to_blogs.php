<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleDescriptionArToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_ar')->nullable();
            $table->text('description_ar')->nullable();
        });
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->string('name_ar')->nullable();
            $table->text('description_ar')->nullable();
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
            $table->dropColumn('title_ar');
            $table->dropColumn('description_ar');
        });
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn('name_ar');
            $table->dropColumn('description_ar');
        });
    }
}
