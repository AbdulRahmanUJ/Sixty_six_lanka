<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pre_order extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        "pre_order_track_no",
        "name",
        "category",
        "quantity",
        "weight",
        "length",
        "width",
        "height",
    ];

    // table name
    public $table = 'pre_orders';
    //primary key
    public $primaryKey = 'id';


    public function pre_order_package()
    {
        return $this->belongsTo(Pre_order_package::class, 'pre_order_track_no');
    }
    public function packagetype()
    {
        return $this->belongsTo(Packagetype::class, 'category');
    }
}
