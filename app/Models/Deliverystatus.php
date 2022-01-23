<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverystatus extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    protected $fillable = [
        'name',
    ];

    // table name
    public $table = 'deliverystatuses';
    //primary key
    public $primaryKey = 'id';

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
