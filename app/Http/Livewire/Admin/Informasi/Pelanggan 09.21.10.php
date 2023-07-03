<?php

namespace App\Http\Livewire\Admin\Informasi;

use App\Models\Konsumen;
use Livewire\Component;
use App\Models\Layanan as ModelsPelanggan;
use App\Models\Transaksi;
use Livewire\WithPagination;

class Pelanggan extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'=> ['except' => '']];
    protected $listeners = [
        'search-transaksi' => 'searchTransaksi',
    ];


    public function updatingSearch($search)
    {
        $this->resetPage();
    }


    public function render()
    {
        $datas = Transaksi::orderBy('tanggal_diterima', 'desc')
        ->when($this->search, function ($q) {
            $q->whereHas('Konsumen', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            });
        })
        ->paginate(50);
        $this->emit('searchTransaksi');
        return view('livewire.admin.informasi.pelanggan',[
            'datas' => $datas
            ])
            ->layout('admin.layouts.app');
    }
}
