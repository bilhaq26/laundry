<?php

namespace App\Http\Livewire\Admin\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    public $search, $from, $to, $status_ambil,$status_bayar, $totalbayar, $total;
    protected $queryString = ['search' => ['except' => '']];
    public $selectfilter = '';
    protected $listeners = [
        'filter-transaksi' => 'filterTransaksi',
        'search-transaksi' => 'searchTransaksi',
        'appointments:delete' => 'delete',

    ];

    public $perPage = 10;

    public function updatingSearch($search)
    {
        $this->resetPage();
    }

    public function render()
    {
        $datas = Transaksi::latest('tanggal_diterima')
            ->when($this->search, function ($q) {
                $q->whereHas('Konsumen', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->from, function ($q) {
                $q->whereBetween('tanggal_diterima', [$this->from, $this->to])
                ->oldest('tanggal_diterima', 'asc');
            })
            ->when($this->status_ambil, function ($q) {
                $q->where('status_ambil', $this->status_ambil);
            })
            ->when($this->status_bayar, function ($q) {
                $q->where('status_bayar', $this->status_bayar);
            })
            ->when($this->totalbayar, function ($q){
                $q->sum('total_bayar');
            })
            ->paginate($this->perPage);
        $this->emit('searchTransaksi');

        $total_semua = $datas->sum('total_bayar');

        return view('livewire.admin.transaksi.index', [
            'datas' => $datas,
            'total_semua' => $total_semua
        ])->layout('admin.layouts.app');
    }

    public function paid($id)
    {
        $data = Transaksi::findOrFail($id);
        $data->status_bayar = 'sudah dibayar';
        $data->tanggal_dibayar = date('Y-m-d H:i:s');
        $data->save();

        $this->showToastr('success', "Status Pembayaran berhasil diperbarui!");
    }

    public function take($id)
    {
        $data = Transaksi::findOrFail($id);
        $data->status_ambil = 'sudah diambil';
        $data->tanggal_diambil = date('Y-m-d H:i:s');
        $data->save();

        $this->showToastr('success', "Status Pembayaran berhasil diperbarui!");
    }

    // print nota
    public function printNota($id)
    {
        $data = Transaksi::findOrFail($id);
        $pdf = PDF::loadView('livewire.admin.pdf.nota', compact('data'))->setPaper('a4', 'potrait')->output();
        return response()->streamDownload(
            fn() => print($pdf), 'nota.pdf'
        );
    }

    public function exportPDF()
    {
        $data = [
            'data' => Transaksi::latest('tanggal_diterima')
            ->when($this->search, function ($q) {
                $q->whereHas('Konsumen', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->totalbayar, function ($q){
                $q->sum('total_bayar');
            })
            ->paginate(40),
            'total_semua' => Transaksi::sum('total_bayar'),
            'total_transaksi' => Transaksi::count('id'),
        ];

        $pdf = PDF::loadView('livewire.admin.pdf.transaksi', $data)->setPaper('a4', 'potrait')->output();
        return response()->streamDownload(
            fn() => print($pdf), 'exportlaporan.pdf'
        );
    }

    public function delete($dataId)
    {
        $data = Transaksi::find($dataId);
        $data->delete();
        $this->showToastr('success', 'Berita berhasil dihapus.');
    }

    public function destroy($dataId)
    {
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Hapus Berita!',
            'text'        => "Anda yakin untuk menghapus berita ini?",
            'confirmText' => 'Hapus!',
            'method'      => 'appointments:delete',
            'onConfirmed' => 'confirmed',
            'params'      => $dataId, // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }

    public function showAlert($icon, $title, $text)
    {
        $this->emit('swal:modal', [
            'icon'  => $icon,
            'title' => $title,
            'text'  => $text,
        ]);
    }

    public function showToastr($icon, $title)
    {
        $this->emit('swal:alert', [
            'icon'    => $icon,
            'title'   => $title,
            'timeout' => 10000
        ]);
    }
}
