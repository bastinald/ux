<?php

namespace App\Components\Users;

use Bastinald\Ux\Traits\WithModel;
use App\Models\User;
use Livewire\Component;

class Password extends Component
{
    use WithModel;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('users.password');
    }

    public function rules()
    {
        return [
            'password' => ['required', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validateModel();

        $this->user->update($this->getModel(['password']));

        $this->emit('hideModal');
    }
}
