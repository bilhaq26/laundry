<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;
    protected $table ='konsumen';
    protected $fillable =['user_id','nama'];
    protected $guard = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    // public function getAllTotalPelanggan()
    // {
    //     return count($this->Transaksi);
    // }
}
