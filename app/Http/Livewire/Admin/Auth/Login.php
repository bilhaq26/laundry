<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username, $password, $remember;
    protected $rules = [
        'username' => 'required|string|max:18|alpha_dash',
        'password' => 'required|min:5',
    ];

    public function mount()
    {
        if(Auth::check())
        {
            return redirect()->route('admin.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.login')
            ->layout('admin.layouts.blank');
    }

    public function attemp()
    {   
        
        sleep(1);
        $validated = $this->validate();
        if ($validated) {
            if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
                return redirect()->route('admin.dashboard');
            } else {
                session()->flash('error', 'Password Salah.');
            }
        }
    }

    public function resVal($type)
    {
        $this->resetValidation($type);
    }
}
