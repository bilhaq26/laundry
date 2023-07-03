<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use App\Models\UserRole;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class Edit extends Component
{
    use WithFileUploads;
    public $dataId, $nama_lengkap, $username, $email, $jenis_pengguna, $password, $photo_profil, $photoPrev;

    public function mount($id)
    {
        $data = User::findOrFail($id);
        if(Auth::user()->id != 1 && $id == 1)
        {
            return abort(404);
        }
        $this->dataId = $data->id;
        $this->nama_lengkap = $data->fullname;
        $this->username = $data->username;
        $this->email = $data->email;
        $this->jenis_pengguna = $data->Role->name;
        $this->photoPrev = $data->photo;
    }

    public function render()
    {
        if(Auth::user()->Role->id == 1){
            $arrRoles = UserRole::latest()->get();
        }else{
            $arrRoles = UserRole::where('id', '!=', 1)->latest()->get();
        }

        return view('livewire.admin.user.edit', [
            'arrRoles' => $arrRoles,
        ])
            ->layout('admin.layouts.app');
    }

    public function store()
    {
        sleep(1);
        $data = User::find($this->dataId);
        $validate = $this->validate([
            'nama_lengkap' => 'required|string',
            'email' => [
                'required',
                Rule::unique('users')->ignore($data->id),
                'email'
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($data->id),
                'string',
                'min:5',
                'max:18',
                'alpha_dash',
            ],
            'password' => 'nullable|min:5|alpha_num',
            'jenis_pengguna' => 'required',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        if ($validate) {
            $fullname = explode(' ', $this->nama_lengkap, 2);
            $firstName = $fullname[0];
            $lastName = '';
            if (isset($fullname[1])) {
                $lastName = $fullname[1];
            }
            $role = UserRole::where('name', $this->jenis_pengguna)->first();
            if (!$role) {
                $this->showAlert('info', 'Jenis Admin', 'Jenis admin yang Anda input salah!');
            } else {
                $data->fullname = $this->nama_lengkap;
                $data->firstname = $firstName;
                $data->lastname = $lastName;
                $data->email = $this->email;
                $data->username = $this->username;
                $data->role_id = $role->id;
                if($this->password)
                {
                    $data->password = Hash::make($this->password);
                }

                if ($this->photo_profil) {
                    $photo = $this->photo_profil;
                    // $imageName = Str::slug($this->data->fullname) . '.' . $photo->getClientOriginalExtension();
                    $imageName = Str::slug($data->username) . '.png';
                    // ORIGINAL
                    $destinationPath = public_path('/storage/images/users/original/');
                    $img = Image::make($photo->getRealPath());
                    $QuploadImage = $img->resize(1080, 1080, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $imageName, 100);
                    // SMALL
                    $destinationPath = public_path('/storage/images/users/small/');
                    $img = Image::make($photo->getRealPath());
                    $QuploadImage = $img->resize(480, 480, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $imageName, 100);
                    $data->photo = $imageName;
                }

                $data->save();
                $this->showToastr('success', "Informasi Akun berhasil diperbarui.");
                return redirect()->route('admin.user.index');
            }
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
