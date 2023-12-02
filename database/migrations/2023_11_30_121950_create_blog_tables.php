<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('blog_category_id')->constrained('blog_categories')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('blog_views', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
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
        Schema::dropIfExists('blog_views');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('blog_categories');
    }
}
