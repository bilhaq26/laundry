<?php

namespace App\Http\Livewire\Admin\Konsumen;

use App\Models\Konsumen;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $nama;

    protected $rules = [
        'nama' => 'required',

    ];

    public function store()
    {
        sleep(1);
        $validasi = $this->validate();

        if ($validasi) {
            $data = new Konsumen();
            $data->nama = $this->nama;
            $data = Auth::user()->konsumen()->save($data);

            $this->showToastr('success', "Pembuatan Konsumen Berhasil.");
                return redirect()->route('admin.konsumen.index');
        }
    }

    public function render()
    {
        return view('livewire.admin.konsumen.create',[
            
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
