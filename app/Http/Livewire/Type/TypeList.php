<?php

namespace App\Http\Livewire\Type;

use App\Models\Type;
use Livewire\Component;

class TypeList extends Component
{
    public $query;
    protected $listeners = ['refreshTypes' => '$refresh'];

    public function types()
    {
        $builder = new Type;

        if ($this->query) {
            $builder = $builder->search($this->query);
        }
        return $builder->get();
    }

    public function render()
    {
        return view('livewire.type.type-list');
    }
}