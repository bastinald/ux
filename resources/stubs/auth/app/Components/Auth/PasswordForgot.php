<?php

namespace App\Components\Auth;

use Bastinald\Ux\Traits\WithModel;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PasswordForgot extends Component
{
    use WithModel;

    public $status;

    public function route()
    {
        return Route::get('password-forgot', static::class)
            ->name('password.forgot')
            ->middleware('guest');
    }

    public function render()
    {
        return view('auth.password-forgot');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
        ];
    }

    public function send()
    {
        $this->validateModel();

        $status = Password::sendResetLink($this->getModel());

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            $this->reset('status');

            return;
        }

        $this->status = $status;
    }
}
