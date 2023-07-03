<?php

namespace App\Http\Livewire\Admin\Informasi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use App\Models\Layanan as ModelsLayanan;

class Layanan extends Component
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
        //LAYANAN
        $datas = ModelsLayanan::orderBy('nama', 'desc')
        ->when($this->search, function ($q) {
            $q->whereHas('Konsumen', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            });
        })
        ->paginate(50);


        return view('livewire.admin.informasi.layanan',[
            'datas' => $datas
        ])
        ->layout('admin.layouts.app');
    }
}
