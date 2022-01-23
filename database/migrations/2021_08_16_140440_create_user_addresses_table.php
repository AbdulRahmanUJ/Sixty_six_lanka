<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('id')->on('users');
            $table->string('address');
            $table->foreignId('city_id')->nullable()->constrained('id')->on('cities');
            $table->foreignId('state_id')->nullable()->constrained('id')->on('states');
            $table->foreignId('country_id')->nullable()->constrained('id')->on('countries');
            $table->string('zip');
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
        Schema::dropIfExists('user_addresses');
    }
}
