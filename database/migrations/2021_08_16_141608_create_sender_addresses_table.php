<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sender_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->nullable()->constrained('id')->on('senders');
            $table->string('address');
            $table->foreignId('city_id')->nullable()->constrained('id')->on('cities');
            $table->string('city_name');
            $table->foreignId('state_id')->nullable()->constrained('id')->on('states');
            $table->string('state_name');
            $table->foreignId('country_id')->nullable()->constrained('id')->on('countries');
            $table->string('country_name');
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
        Schema::dropIfExists('sender_addresses');
    }
}
