<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['layanan_id', 'barang_id', 'total_bayar', 'status','tangga_diterima', 'tanggal_ambil'];
    protected $guard = [];

    public function Layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function Barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function Konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function ListTransaksi()
    {
        return $this->hasMany(ListTransaksi::class);
    }

    public function getAllTotalLayanan()
    {
        return count($this->ListTransaksi);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
