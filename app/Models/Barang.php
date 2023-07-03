<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['user_id','barang'];
    protected $guard = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DetailBarang()
    {
        return $this->hasMany(DetailBarang::class);
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
