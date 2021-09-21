<?php

namespace App\Http\Livewire\Type;

use Livewire\Component;
use App\Actions\Future\Contracts\Type\CreateNewTypes;

class TypeCreateForm extends Component
{
    public $state = [];

    public function createType(CreateNewTypes $creator)
    {
        $this->resetErrorBag();
        $type = $creator->create($this->state);
        $this->state = [
            'name' => ''
        ];

        $this->emit('refreshTypes');
        $this->emit('saved');
    }
    public function render()
    {
        return view('livewire.type.type-create-form');
    }
}
