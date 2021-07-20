<?php

namespace DummyComponentNamespace;

use Bastinald\Ux\Traits\WithModel;
use DummyModelNamespace\DummyModelClass;
use Livewire\Component;

class Password extends Component
{
    use WithModel;

    public $dummyModelVariable;

    public function mount(DummyModelClass $dummyModelVariable)
    {
        $this->dummyModelVariable = $dummyModelVariable;
    }

    public function render()
    {
        return view('dummy.prefix.password');
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

        $this->dummyModelVariable->update($this->getModel(['password']));

        $this->emit('hideModal');
    }
}
