<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sender_address extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    protected $fillable = [
        'address',
        'country_id',
        'country_name',
        'state_id',
        'state_name',
        'city_id',
        'city_name',
        'zip',
        'sender_id',

    ];

    // table name
    public $table = 'sender_addresses';
    //primary key
    public $primaryKey = 'id';

    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }
    public function package()
    {
        return $this->hasMany(Package::class);
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
