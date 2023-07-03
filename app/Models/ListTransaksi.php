<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTransaksi extends Model
{
    protected $table = 'list_transaksi';
    protected $guard = [];
    use HasFactory;

    protected $fillable = [
        'id',
        'transaksi_id',
        'layanan_id',
        'berat',
        'total_bayar',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function Barang()
    {
        return $this->hasMany(Barang::class);
    }

}
