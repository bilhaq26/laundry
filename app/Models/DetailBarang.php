<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    use HasFactory;
    protected $table = 'detail_barang';
    protected $fillable = ['barang_id','nama'];
    protected $guard = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
