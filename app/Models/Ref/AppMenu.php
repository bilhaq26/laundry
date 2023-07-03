<?php

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ref_app_menu';
    protected $guard = [];

    public function Parent()
    {
        return $this->hasOne('App\Models\Ref\AppMenu', 'id', 'parent_id');
    }

    public function Childs()
    {
        return $this->hasMany('App\Models\Ref\AppMenu', 'parent_id', 'id')->orderBy('sort');
    }
}
