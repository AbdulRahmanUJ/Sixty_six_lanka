<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiver_address extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    protected $fillable = [
        'address',
        'country_id',
        'state_id',
        'city_id',
        'zip',
        'receiver_id',

    ];

    // table name
    public $table = 'receiver_addresses';
    //primary key
    public $primaryKey = 'id';

    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }
    public function package()
    {
        return $this->hasMany(Package::class);
    }
    public function pre_order_package()
    {
        return $this->hasMany(Pre_order_package::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
