<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        'track_no',
        'name',
        'category',
        'quantity',
        'weight',
        'length',
        'width',
        'height'
    ];

    // table name
    public $table = 'orders';
    //primary key
    public $primaryKey = 'id';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function packagetype()
    {
        return $this->belongsTo(Packagetype::class, 'category');
    }
}
