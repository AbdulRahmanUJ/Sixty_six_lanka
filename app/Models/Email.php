<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory;
    use SoftDeletes;
    //timestamps
    public $timestamps=true;

    public $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'content',
    ];

    // table name
    public $table = 'emails';
    //primary key
    public $primaryKey = 'id';
}
