<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
        //timestamps
        public $timestamps=true;

    public $fillable = [
        'name',
        'state_id',
    ];

    // table name
    public $table = 'cities';
    //primary key
    public $primaryKey = 'id';

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function receiver()
    {
        return $this->hasMany(Receiver_address::class);
    }
    public function sender()
    {
        return $this->hasMany(Sender_address::class);
    }
    public function user_address()
    {
        return $this->hasMany(User_address::class);
    }
}
