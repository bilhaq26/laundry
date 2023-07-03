<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
   use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'appointments:delete' => 'delete',
    ];
    public $search;

    public function render()
    {
        if(Auth::user()->Role->id == 1)
        {
            $datas = User::latest()
            ->when(request()->search, function($query){
                $query->where('fullname', 'like', '%'.request()->search.'%');
            })
            ->paginate(10);
        }else{
            $datas = User::where('id', '!=', 1)->latest()->paginate(10);
        }
        return view('livewire.admin.user.index',[
            'datas' => $datas,
        ])
        ->layout('admin.layouts.app');
    }

    public function delete($userId)
    {
        $user = User::find($userId);
        if($user->id == Auth::id())
        {
            $this->showToastr('warning', 'Tidak dapat menghapus Pengguna ini.');
        }else{
            $user->delete();
            $this->showToastr('success', 'Pengguna berhasil dihapus.');
        }
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
