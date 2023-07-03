<?php

namespace App\Http\Middleware;

use App\Models\Ref\Pengunjung;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengunjungMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $data = Pengunjung::where('type', 'Public')->where('date', date('Y-m-d'))->first();
        if(! $data)
        {
            $data = new Pengunjung();
            $data->type = 'Public';
            $data->date = date('Y-m-d');
            $data->count = 1;
            $data->save();
        }else{
            $data->count = $data->count + 1;
            $data->save();
        }
        return $next($request);
    }
}
