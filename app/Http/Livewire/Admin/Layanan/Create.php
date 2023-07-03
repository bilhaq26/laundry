<?php

namespace App\Http\Livewire\Admin\Layanan;

use App\Models\Layanan;
use Livewire\Component;

class Create extends Component
{
    public $nama, $durasi, $harga;

    protected $rules = [
        'nama' => 'required',
        'durasi' => 'required',
        'harga' => 'required',

    ];

    public function render()
    {
        return view('livewire.admin.layanan.create',[
            
        ])
        ->layout('admin.layouts.app');
    }

    public function store()
    {
        sleep(1);
        $validasi = $this->validate();

        if ($validasi) {
            $data = new Layanan();
            $data->nama = $this->nama;
            $data->durasi = $this->durasi;
            $data->harga = $this->harga;
            $data->save();

            $this->showToastr('success', "Pembuatan Layanan Berhasil.");
                return redirect()->route('admin.layanan.index');
        }
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
