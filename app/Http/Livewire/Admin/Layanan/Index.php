<?php

namespace App\Http\Livewire\Admin\Layanan;

use App\Models\Layanan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $dataId, $search;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'appointments:delete' => 'delete',
    ];

    public function render()
    {

        $datas = Layanan::orderBy('nama')
        ->when($this->search, function ($q) {
            $q->where('nama', 'like', '%' . $this->search . '%');
        })->paginate(20);

        return view('livewire.admin.layanan.index',[
            'datas' => $datas,
        ])
        ->layout('admin.layouts.app');
    }

    public function UpdatingSearch($search)
    {
        $this->resetPage();
    }

    public function delete($userId)
    {
        $data = Layanan::find($userId);
        $data->delete();
        $this->showToastr('success', 'Layanan berhasil dihapus.');
    }

    public function destroy($userId)
    {
        $this->emit("swal:confirm", [
            'icon'        => 'warning',
            'title'       => 'Hapus Pengguna!',
            'text'        => "Anda yakin untuk menghapus pengguna ini?",
            'confirmText' => 'Hapus!',
            'method'      => 'appointments:delete',
            'onConfirmed' => 'confirmed',
            'params'      => $userId, // optional, send params to success confirmation
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
