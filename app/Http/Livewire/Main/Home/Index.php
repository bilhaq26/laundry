<?php

namespace App\Http\Livewire\Main\Home;

use Livewire\Component;


class Index extends Component
{
    public function render()
    {
        
        return view('livewire.main.home.index', [
        
        ])
            ->layout('main.layouts.app');
    }
}
