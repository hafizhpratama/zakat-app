<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaEmas extends Model
{
    use SoftDeletes;
    protected $table = 'harga_emas';
    protected $fillable = [
        'harga_emas', 'id',
    ];

    protected $hidden = [

    ];
}
