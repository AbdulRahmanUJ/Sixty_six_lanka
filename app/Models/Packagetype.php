<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packagetype extends Model
{
    use HasFactory;
    use SoftDeletes;
        //timestamps
        public $timestamps=true;

        protected $fillable = [
        'name',

    ];

        // table name
        public $table = 'packagetypes';
        //primary key
        public $primaryKey = 'id';

        public function packages()
    {
        return $this->hasMany(Package::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function pre_order()
    {
        return $this->hasMany(Pre_order::class);
    }
}
