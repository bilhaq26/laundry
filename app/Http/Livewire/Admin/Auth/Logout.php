<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function mount()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
