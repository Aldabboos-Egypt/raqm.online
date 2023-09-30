<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOauthToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('oauth_type')->nullable();
            $table->string('verification_key')->nullable();
            $table->date('date_verify_key')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->text('oauth_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
