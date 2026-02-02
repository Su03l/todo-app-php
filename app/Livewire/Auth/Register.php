<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Register extends Component
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        try {
            $this->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // إرسال توست نجاح
            $this->dispatch('notify', message: 'تم إنشاء الحساب بنجاح!', type: 'success');

            return redirect()->route('login');

        } catch (ValidationException $e) {
            // إرسال توست خطأ عام
            $this->dispatch('notify', message: 'يرجى التحقق من البيانات المدخلة', type: 'error');
            throw $e; // إعادة رمي الخطأ ليظهر تحت الحقول أيضاً
        } catch (\Exception $e) {
            // إرسال توست خطأ غير متوقع
            $this->dispatch('notify', message: 'حدث خطأ غير متوقع: ' . $e->getMessage(), type: 'error');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app');
    }
}
