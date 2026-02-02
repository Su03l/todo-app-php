<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $avatar;
    public $new_avatar;

    // Password Change
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->avatar = $user->avatar;
    }

    public function updateProfile()
    {
        $user = Auth::user();

        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'new_avatar' => 'nullable|image|max:1024', // 1MB Max
        ]);

        if ($this->new_avatar) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $this->new_avatar->store('avatars', 'public');
            $user->avatar = $path;
            $this->avatar = $path;
        }

        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'email' => $this->email,
        ]);

        session()->flash('profile_success', 'تم تحديث الملف الشخصي بنجاح.');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        session()->flash('password_success', 'تم تغيير كلمة المرور بنجاح.');
    }

    public function render()
    {
        return view('livewire.profile')->layout('layouts.app');
    }
}
