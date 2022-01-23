<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreOrderPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_order_packages', function (Blueprint $table) {
            $table->id();
            $table->string('pre_order_track_no')->unique();
            $table->foreignId('sender_id')->nullable()->constrained('id')->on('users');
            $table->foreignId('sender_address_id')->nullable()->constrained('id')->on('user_addresses');
            $table->foreignId('receiver_id')->nullable()->constrained('id')->on('receivers');
            $table->foreignId('receiver_address_id')->nullable()->constrained('id')->on('receiver_addresses');
            $table->foreignId('packing_type_id')->nullable()->constrained('id')->on('packingtypes')->onUpdate('cascade');
            $table->integer('status')->default(0);
            $table->foreignId('shipping_mode_id')->nullable()->constrained('id')->on('shippingmodes');
            $table->foreignId('payment_method_id')->nullable()->constrained('id')->on('paymentmethods');
            $table->foreignId('delivery_status_id')->nullable()->constrained('id')->on('deliverystatuses')->onUpdate('cascade');
            $table->string('total_kg_weight')->nullable();
            $table->string('total_volumetric_weight')->nullable();
            $table->string('calculate_weight')->nullable();
            $table->decimal('price_per_kg', 10, 2);
            $table->float('tax_rate')->nullable();
            $table->float('discount')->nullable();
            $table->date('est_deli_date');
            $table->decimal('courier_fee', 10, 2);
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
        Schema::dropIfExists('pre_order_packages');
    }
}
