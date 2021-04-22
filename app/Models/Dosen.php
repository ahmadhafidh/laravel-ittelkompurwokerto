<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    
    /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * post
     *
     * @return void
     */
    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class);
    // }
}
