<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory;
    use  SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        'name',
        'country_id',
    ];

    // table name
    public $table = 'states';
    //primary key
    public $primaryKey = 'id';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function user_address()
    {
        return $this->hasMany(User_address::class);
    }
    public function receiver()
    {
        return $this->hasMany(Receiver_address::class);
    }
    public function sender()
    {
        return $this->hasMany(Sender_address::class);
    }
}
