<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $table = 'pengunjung';
    protected $fillable = [
      'type',
      'date',
      'count',
    ];
    protected $guard = [];
}
