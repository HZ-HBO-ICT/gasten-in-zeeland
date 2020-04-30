<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->boolean('isAdmin')->default(false);
            $table->text('organisation');
            $table->string('accomodation')->nullable();
            $table->integer('max_capacity');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->text('kvk_number');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
