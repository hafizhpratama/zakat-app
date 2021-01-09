<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Model adalah polymorphism. Karena dia banyak digunakan di banyak kelas dan merupakan sebuah abstract class.
// Polimorfisme dalam OOP adalah sebuah prinsip di mana class dapat memiliki banyak “bentuk” method yang berbeda-beda meskipun namanya sama.
class Pengeluaran extends Model
{
    use SoftDeletes;
    protected $table = 'pengeluaran_zakat';
    protected $fillable = [
        'pengeluaran', 'nominal', 'created_at'
    ];

    protected $hidden = [

    ];
}
