<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppIdentity extends Model
{
    use HasFactory;
    protected $table = 'ref_app_identity';
    protected $guard = [];
}
