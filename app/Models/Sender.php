<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sender extends Model
{
    use HasFactory;
    use SoftDeletes;

    //timestamps
    public $timestamps=true;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'admin_id',
    ];

    // table name
    public $table = 'senders';
    //primary key
    public $primaryKey = 'id';

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
    public function admin()
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
    public function sender_address()
    {
        return $this->hasMany(Sender_address::class);
    }
    public function pre_order_package()
    {
        return $this->hasMany(Pre_order_package::class);
    }
}
