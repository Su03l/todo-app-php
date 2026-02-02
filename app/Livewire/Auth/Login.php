<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $login_field;
    public $password;

    public function login()
    {
        try {
            $this->validate([
                'login_field' => 'required',
                'password' => 'required',
            ]);

            $login_type = filter_var($this->login_field, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if (Auth::attempt([$login_type => $this->login_field, 'password' => $this->password])) {
                session()->regenerate();
                $this->dispatch('notify', message: 'تم تسجيل الدخول بنجاح', type: 'success');
                return redirect()->route('dashboard');
            }

            $this->addError('login_field', 'بيانات الدخول غير صحيحة.');
            $this->dispatch('notify', message: 'بيانات الدخول غير صحيحة', type: 'error');

        } catch (ValidationException $e) {
            $this->dispatch('notify', message: 'يرجى ملء جميع الحقول', type: 'error');
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}
