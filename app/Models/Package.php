<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        'track_no',
        'total_kg_weight',
        'calculate_weight',
        'packagetype_id',
        'sender_id',
        'sender_address_id',
        'receiver_id',
        'receiver_address_id',
        'est_deli_date',
        'admin_id',
        'pre_order_user',
        'packing_type_id',
        'shipping_mode_id',
        'payment_method_id',
        'delivery_status_id',
        'shipping_insurance',
        'total_volumetric_weight',
        'price_per_kg',
        'sub_total',
        'courier_fee',
        'tax_rate',
        'customs_tariffs',
        're_expedition',
        'discount',
        'is_cancel',
        'reason_cancel',
        'person_receives',
        'image',
        'is_pickup',
    ];

    // table name
    public $table = 'packages';
    //primary key
    public $primaryKey = 'id';
    // protected $dates = ['est_deli_date'];


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
        return $this->belongsTo(Sender::class);
    }
    public function sender_address()
    {
        return $this->belongsTo(Sender_address::class);
    }
    public function packagetype()
    {
        return $this->belongsTo(Packagetype::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function deliverystatus()
    {
        return $this->belongsTo(Deliverystatus::class, 'delivery_status_id');
    }
    public function packingtype()
    {
        return $this->belongsTo(Packingtype::class, 'packing_type_id');
    }
    public function paymentmethod()
    {
        return $this->belongsTo(Paymentmethod::class, 'payment_method_id');
    }
    public function shippingmode()
    {
        return $this->belongsTo(Shippingmode::class, 'shipping_mode_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }
    public function pre_order_packages()
    {
        return $this->hasMany(Pre_order_package::class);
    }
}
