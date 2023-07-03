<?php

namespace App\Http\Livewire\Main\Detail;

use Livewire\Component;
use App\Models\Transaksi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Index extends Component
{
    public $data;

    public function render()
    {
        return view('livewire.main.detail.index',[

        ])->layout('main.layouts.app');
    }

    public function mount($id)
    {
        $this->data = Transaksi::where('id', $id)->firstOrFail();

        if($this->data == null){
            abort(404);
        }

    }
}
