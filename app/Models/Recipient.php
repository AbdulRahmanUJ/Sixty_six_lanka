<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Model
{
    use HasFactory;
    use SoftDeletes;

    //timestamps
    public $timestamps=true;

    protected $fillable = [
        'name',
        'track_no',
        'image',
        'delivered_date',

    ];

    // table name
    public $table = 'recipients';
    //primary key
    public $primaryKey = 'id';

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
