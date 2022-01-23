<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        'country_id',
        'sort',
        'country_name',
        'phoneCode',
        'is_active',
    ];

    // table name
    public $table = 'countries';
    //primary key
    public $primaryKey = 'id';

    public function state()
    {
        return $this->hasMany(State::class);
    }
    public function user_address()
    {
        return $this->hasMany(User_address::class);
    }
}
