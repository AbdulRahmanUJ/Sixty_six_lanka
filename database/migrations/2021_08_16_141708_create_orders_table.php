<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('track_no')->nullable()->constrained('id')->on('packages');
            $table->foreignId('admin_id')->nullable()->constrained('id')->on('users');
            $table->string('name');
            $table->foreignId('category')->nullable()->constrained('id')->on('packagetypes');
            $table->string('quantity');
            $table->string('weight');
            $table->string('length');
            $table->string('width');
            $table->string('height');
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
        Schema::dropIfExists('orders');
    }
}
