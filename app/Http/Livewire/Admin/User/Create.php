<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use App\Models\UserRole;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class Create extends Component
{
    use WithFileUploads;
    public $nama_lengkap, $username, $email, $jenis_pengguna, $password, $photo_profil;
    protected $rules = [
        'nama_lengkap' => 'required|string',
        'email' => 'required|unique:user|email',
        'username' => 'required|unique:user|string|min:5|max:18|alpha_dash',
        'password' => 'required|min:5|alpha_num',
        'jenis_pengguna' => 'required',
        'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
    ];

    public function render()
    {
        if(Auth::user()->Role->id == 1){
            $arrRoles = UserRole::latest()->get();
        }else{
            $arrRoles = UserRole::where('id', '!=', 1)->latest()->get();
        }
        return view('livewire.admin.user.create', [
            'arrRoles' => $arrRoles,
        ])
            ->layout('admin.layouts.app');
    }

    public function store()
    {
        sleep(1);
        $validate = $this->validate();
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
                $data = new User();
                $data->fullname = $this->nama_lengkap;
                $data->firstname = $firstName;
                $data->lastname = $lastName;
                $data->email = $this->email;
                $data->username = $this->username;
                $data->password = Hash::make($this->password);
                $data->is_admin = 'true';
                $data->user_status = 'active';
                $data->role_id = $role->id;

                if ($this->photo_profil) {

                    $photo = $this->photo_profil;
                    // $imageName = Str::slug($this->data->fullname) . '.' . $photo->getClientOriginalExtension();
                    $imageName = Str::slug($data->username) . '.png';
                    // ORIGINAL
                    $destinationPath = public_path('/storage/images/user/original/');
                    $img = Image::make($photo->getRealPath());
                    $QuploadImage = $img->resize(1080, 1080, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $imageName, 100);

                    // SMALL
                    $destinationPath = public_path('/storage/images/user/small/');
                    $img = Image::make($photo->getRealPath());
                    $QuploadImage = $img->resize(480, 480, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . $imageName, 100);

                    $data->photo = $imageName;
                }else{
                    $data->photo = 'default.png';
                }
                $data->save();
                
                $this->showToastr('success', "Pembuatan Akun Berhasil.");
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
