<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cost extends Model
{
    use HasFactory;
    use SoftDeletes;
        //timestamps
        public $timestamps=true;

        protected $fillable = [
        'name',
        'cost',
    ];

        // table name
        public $table = 'costs';
        //primary key
        public $primaryKey = 'id';
}
