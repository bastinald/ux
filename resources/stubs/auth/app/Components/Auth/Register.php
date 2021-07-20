<?php

namespace App\Components\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Bastinald\Ux\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;
use Lukeraymonddowning\Honey\Traits\WithRecaptcha;

class Register extends Component
{
    use WithHoney, WithRecaptcha, WithModel;

    public function route()
    {
        return Route::get('register', static::class)
            ->name('register')
            ->middleware('guest');
    }

    public function render()
    {
        return view('auth.register');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function register()
    {
        $this->validateModel();

        if (!$this->honeyPasses()) {
            return;
        }

        $user = User::create($this->getModelExcept('password_confirmation'));

        Auth::login($user, true);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
