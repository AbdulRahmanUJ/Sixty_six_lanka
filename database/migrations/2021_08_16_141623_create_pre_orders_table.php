<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_orders', function (Blueprint $table) {
            $table->id();
            // orders
            $table->foreignId('pre_order_track_no')->nullable()->constrained('id')->on('pre_order_packages');
            $table->string('name');
            $table->string('category');
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
        Schema::dropIfExists('pre_orders');
    }
}
