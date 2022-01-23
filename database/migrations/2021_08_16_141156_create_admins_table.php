<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->foreignId('city_id')->nullable()->constrained('id')->on('cities');
            $table->foreignId('state_id')->nullable()->constrained('id')->on('states');
            $table->foreignId('country_id')->nullable()->constrained('id')->on('countries');
            $table->string('post_code');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
