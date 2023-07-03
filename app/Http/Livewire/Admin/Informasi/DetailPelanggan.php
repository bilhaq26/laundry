<?php

namespace App\Http\Livewire\Admin\Informasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ListTransaksi;

class DetailPelanggan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $datas, $search, $total;

    public function render()
    {
        return view('livewire.admin.informasi.detail-pelanggan',[

            ])
            ->layout('admin.layouts.app');
    }

    public function mount($id)
    {
        $this->datas = ListTransaksi::where('transaksi_id', $id)->get();
        $this->total = ListTransaksi::where('transaksi_id', $id)->sum('total_bayar');
    }
}
