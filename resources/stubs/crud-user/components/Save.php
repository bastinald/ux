<?php

namespace DummyComponentNamespace;

use Bastinald\Ux\Traits\WithModel;
use DummyModelNamespace\DummyModelClass;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Save extends Component
{
    use WithModel;

    public $dummyModelVariable;

    public function mount(DummyModelClass $dummyModelVariable = null)
    {
        $this->dummyModelVariable = $dummyModelVariable;

        $this->setModel($dummyModelVariable->toArray());
    }

    public function render()
    {
        return view('dummy.prefix.save');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('dummy_model_table')->ignore($this->dummyModelVariable->id)],
            'password' => [!$this->dummyModelVariable->exists ? 'required' : 'nullable', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validateModel();

        $this->dummyModelVariable->fill($this->getModelExcept('password_confirmation'))->save();

        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
