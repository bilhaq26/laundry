<?php

namespace App\Http\Livewire\Admin\Informasi;

use App\Models\Layanan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ListTransaksi;

class DetailLayanan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $datas;

    public function render()
    {
        $arrData = Layanan::all();
        return view('livewire.admin.informasi.detail-layanan',[
            'arrData' => $arrData,
        ])
        ->layout('admin.layouts.app');
    }

    public function mount($id)
    {
        $this->datas = ListTransaksi::where('layanan_id', $id)->get();
        $this->total = ListTransaksi::where('layanan_id', $id)->sum('total_bayar');
        
    }
}
