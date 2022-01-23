<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pre_order_package extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        "pre_order_track_no",
        "sender_id",
        "sender_address_id",
        "receiver_id",
        "receiver_address_id",
        "packing_type_id",
        "shipping_mode_id",
        "payment_method_id",
        "delivery_status_id",
        "total_kg_weight",
        "calculate_weight",
        "price_per_kg",
        "discount",
        "tax_rate",
        "total_volumetric_weight",
        "est_deli_date",
        "courier_fee",
    ];

    // table name
    public $table = 'pre_order_packages';
    //primary key
    public $primaryKey = 'id';


    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }
    public function receiver_address()
    {
        return $this->belongsTo(Receiver_address::class);
    }
    public function sender()
    {
        return $this->belongsTo(User::class);
    }
    public function sender_address()
    {
        return $this->belongsTo(User_address::class);
    }
    public function packagetype()
    {
        return $this->belongsTo(Packagetype::class);
    }
    public function packingtype()
    {
        return $this->belongsTo(Packingtype::class, 'packing_type_id');
    }
    public function payment_method()
    {
        return $this->belongsTo(Paymentmethod::class, 'payment_method_id');
    }
    public function shippingmode()
    {
        return $this->belongsTo(Shippingmode::class, 'shipping_mode_id');
    }
    public function deliverystatus()
    {
        return $this->belongsTo(Deliverystatus::class, 'delivery_status_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
