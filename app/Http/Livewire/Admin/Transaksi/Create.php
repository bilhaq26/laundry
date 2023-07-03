<?php

namespace App\Http\Livewire\Admin\Transaksi;

use App\Models\Layanan;
use Livewire\Component;
use App\Models\Konsumen;
use App\Models\Transaksi;
use App\Models\ListTransaksi;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $nama,$keterangan, $berat,$tanggal_diterima, $total_bayar, $layanan_nama, $layanan_id, $konsumen_id;
    public $tambah;
    public $items = [];

    public function render()
    {
        $arrLayanan = Layanan::orderBy('nama', 'asc')->get();
        $arrKonsumen = Konsumen::orderBy('nama', 'asc')->get();

        return view('livewire.admin.transaksi.create', [
            'arrLayanan' => $arrLayanan,
            'arrKonsumen' => $arrKonsumen,
        ])
            ->layout('admin.layouts.app');
    }

    public function resetField()
    {
        $this->berat = null;
        $this->layanan_id = null;
        $this->nama = null;
    }

    //MODAL
    public function konsumen()
    {
        $validate = $this->validate([
            'nama' => 'required',
        ]);
        if ($validate) {
            $data = new Konsumen();
            $data->nama = $this->nama;
            $data = Auth::user()->konsumen()->save($data);
        }
        $this->resetField();
        $this->emit('dataStore');
        $this->showToastr('success', "Transaksi Berhasil ditambahkan");
    }

    //END MODAL
    public function store()
    {
        $validate = $this->validate([
            'konsumen_id' => 'required',
            'tanggal_diterima' => 'required',
        ]);

        if ($validate) {
            $transaksi = new Transaksi();
            $transaksi->konsumen_id = $this->konsumen_id;
            $transaksi->user_id = Auth::user()->id;
            $transaksi->keterangan = $this->keterangan;
            $transaksi->tanggal_diterima = $this->tanggal_diterima;
            $transaksi->status_bayar = 'belum dibayar';
            $transaksi->status_ambil = 'belum diambil';
            $transaksi->total_bayar = $this->getGrandTotal();
            $transaksi->save();

            if($transaksi) {
                foreach($this->items as $item) {
                    ListTransaksi::create([
                        'transaksi_id' => $transaksi->id,
                        'layanan_id' => $item['layanan_id'],
                        'berat' => $item['berat'],
                        'total_bayar' => $item['total_bayar'],
                    ]);
                }
            }
        }

        $this->showToastr('success', "Transaksi Berhasil.");
        return redirect()->route('admin.transaksi.index');
    }

    public function addToCart()
    {
        // layanan
        $layanan = Layanan::findOrFail($this->layanan_id);

        $this->items[] = [
            'layanan_id' => $this->layanan_id,
            'nama_layanan' => $layanan->nama,
            'berat' => $this->berat,
            'total_bayar' => $layanan->harga * $this->berat
        ];

        $this->resetField();
        $this->emit('dataStore');
        $this->showToastr('success', "Layanan Berhasil ditambahkan");
    }

    public function removeFromCart($index)
    {
        unset($this->items[$index]);
        $this->emit('dataStore');
        $this->showToastr('success', "Layanan Berhasil dihapus");
    }

    public function getGrandTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['total_bayar'];
        }
        return $total;
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
