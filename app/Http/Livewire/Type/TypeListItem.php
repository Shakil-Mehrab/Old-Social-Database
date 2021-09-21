<?php

namespace App\Http\Livewire\Type;

use App\Models\Type;
use Livewire\Component;
use App\Actions\Future\Http\Type\UpdateType;

class TypeListItem extends Component
{
    public $type;
    public $state = [];
    public $showingTypeEditModal;
    public $showingTypeDeleteModal;


    public function mount(Type $type)
    {
        $this->type = $type;
        $this->state['name'] = $type->name;
    }

    public function updateType(UpdateType $updater)
    {
        $this->resetErrorBag();
        $updater->update($this->type, $this->state);
        $this->emit('refreshTypes');
        $this->showingTypeEditModal = null;
    }

    public function deleteType()
    {
        $this->type->delete();
        $this->showingTypeDeleteModal = null;
        $this->emit('refreshTypes');
    }

    public function render()
    {
        return view('livewire.type.type-list-item');
    }
}