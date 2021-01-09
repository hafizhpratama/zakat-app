<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BayarZakat extends Model
{
    use SoftDeletes;
    protected $table = 'pembayaran_zakat';
    protected $fillable = [
        'nama_pengirim', 'users_id', 'asal_bank', 'jenis_zakat', 'nominal', 'image', 'status'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this-> belongsTo(User::class, 'users_id', 'id');
    }

}
