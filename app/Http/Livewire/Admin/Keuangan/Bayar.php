<?php

namespace App\Http\Livewire\Admin\Keuangan;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;

class Bayar extends Component
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
        $total = Transaksi::where('status_bayar', 'sudah dibayar')->sum('total_bayar');
        $datas = Transaksi::where('status_bayar', '=', 'sudah dibayar')
            ->when($this->search, function ($q) {
                $q->whereHas('Konsumen', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                });
            })
            ->latest('tanggal_diterima', 'asc')
            ->paginate(20);
        $this->emit('searchTransaksi');
        return view('livewire.admin.keuangan.bayar',[
            'total' => $total,
            'datas' => $datas,
            ])
            ->layout('admin.layouts.app');
    }
}
