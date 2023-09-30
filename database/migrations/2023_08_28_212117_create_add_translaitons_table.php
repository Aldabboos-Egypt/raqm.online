<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTranslaitonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_translaitons', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->foreignId('add_id')->constrained('adds')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('add_translaitons');
    }
}
