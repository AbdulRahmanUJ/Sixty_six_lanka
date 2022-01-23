<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_address extends Model
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
        'user_id',

    ];

    // table name
    public $table = 'user_addresses';
    //primary key
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
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
