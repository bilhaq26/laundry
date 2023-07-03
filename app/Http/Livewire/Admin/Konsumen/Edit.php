<?php

namespace App\Http\Livewire\Admin\Konsumen;

use Livewire\Component;
use App\Models\Konsumen;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $nama;

    protected $rules = [
        'nama' => 'required',


    ];


    public function mount($id)
    {
        $data = Konsumen::findOrFail($id);
        $this->dataId = $data->id;
        $this->nama = $data->nama;
    }

    public function store()
    {
        sleep(1);
        $data = Konsumen::find($this->dataId);
        $validate = $this->validate([
            'nama' => 'required',
        ]);

        if ($validate) 
        {
                $data->nama = $this->nama;
                $data = Auth::user()->konsumen()->save($data);
                $this->showToastr('success', "Informasi Akun berhasil diperbarui.");
                return redirect()->route('admin.konsumen.index');
        }
    }


    public function render()
    {
        return view('livewire.admin.konsumen.edit',[
            
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
