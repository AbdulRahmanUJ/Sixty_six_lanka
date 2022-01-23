<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('track_no')->unique();
            $table->string('person_receives')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_pickup')->nullable()->default(false);
            $table->foreignId('sender_id')->nullable()->constrained('id')->on('senders');
            $table->foreignId('sender_address_id')->nullable()->constrained('id')->on('sender_addresses');
            $table->foreignId('receiver_id')->nullable()->constrained('id')->on('receivers');
            $table->foreignId('receiver_address_id')->nullable()->constrained('id')->on('receiver_addresses');
            $table->foreignId('admin_id')->nullable()->constrained('id')->on('users')->onUpdate('cascade');
            $table->foreignId('pre_order_user')->nullable()->constrained('id')->on('users')->onUpdate('cascade');
            $table->foreignId('pre_order_package_id')->nullable()->constrained('id')->on('pre_order_packages')->onUpdate('cascade');
            $table->foreignId('packing_type_id')->nullable()->constrained('id')->on('packingtypes')->onUpdate('cascade');
            $table->foreignId('shipping_mode_id')->nullable()->constrained('id')->on('shippingmodes');
            $table->foreignId('payment_method_id')->nullable()->constrained('id')->on('paymentmethods');
            $table->foreignId('delivery_status_id')->nullable()->constrained('id')->on('deliverystatuses')->onUpdate('cascade');
            $table->integer('total_kg_weight')->nullable();
            $table->integer('total_volumetric_weight')->nullable();
            $table->integer('calculate_weight')->nullable();
            $table->date('est_deli_date');
            $table->decimal('price_per_kg', 10, 2);
            $table->decimal('sub_total', 10, 2);
            $table->decimal('courier_fee', 10, 2);
            $table->float('tax_rate')->nullable();
            $table->float('shipping_insurance')->nullable();
            $table->float('customs_tariffs')->nullable();
            $table->float('re_expedition')->nullable();
            $table->float('discount')->nullable();
            $table->boolean('is_cancel')->nullable()->default(false);
            $table->string('reason_cancel')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
