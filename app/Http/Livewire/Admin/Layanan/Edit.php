<?php

namespace App\Http\Livewire\Admin\Layanan;

use App\Models\Layanan;
use Livewire\Component;

class Edit extends Component
{
    public $nama, $durasi, $harga;

    protected $rules = [
        'nama' => 'required',
        'durasi' => 'required',
        'harga' => 'required',

    ];

    public function mount($id)
    {
        $data = Layanan::findOrFail($id);
        $this->dataId = $data->id;
        $this->nama = $data->nama;
        $this->durasi = $data->durasi;
        $this->harga = $data->harga;
    }

    public function update()
    {
        sleep(1);
        $data = Layanan::find($this->dataId);
        $validate = $this->validate([
            'nama' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
        ]);

        if ($validate) 
        {
                $data->nama = $this->nama;
                $data->durasi = $this->durasi;
                $data->harga = $this->harga;
                $data->save();
                $this->showToastr('success', "Informasi Akun berhasil diperbarui.");
                return redirect()->route('admin.layanan.index');
        }
    }


    public function render()
    {
        return view('livewire.admin.layanan.edit',[
            
            ])
            ->layout('admin.layouts.app');
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