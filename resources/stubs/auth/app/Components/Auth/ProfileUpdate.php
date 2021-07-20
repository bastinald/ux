<?php

namespace App\Components\Auth;

use Bastinald\Ux\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileUpdate extends Component
{
    use WithModel;

    public function mount()
    {
        $this->setModel(Auth::user()->toArray());
    }

    public function render()
    {
        return view('auth.profile-update');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
        ];
    }

    public function save()
    {
        $this->validateModel();

        Auth::user()->update($this->getModel());

        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
