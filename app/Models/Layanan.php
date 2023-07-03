<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';
    protected $guard = [];

    use HasFactory;

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function ListTransaksi()
    {
        return $this->hasMany(ListTransaksi::class);
    }

    public function getAllTotalLayanan()
    {
        return count($this->ListTransaksi);
    }
}
