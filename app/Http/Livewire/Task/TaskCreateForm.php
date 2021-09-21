<?php

namespace App\Http\Livewire\Task;

use App\Models\Tag;
use App\Models\Area;
use App\Models\Task;
use App\Models\Type;
use Livewire\Component;
use App\Platform\Platform;
use App\Actions\Future\Contracts\Tag\CreateNewTags;
use App\Actions\Future\Contracts\Task\CreateNewTasks;

// use App\Models\Platform;

class TaskCreateForm extends Component
{
    public $state = [];
    public $newOption;
    public $tags;
    public $types;
    public $query = '';
    public $selectedRegion = [];
    public $test = [];

    public function mount()
    {
        $this->tags = $this->getTags();
        $this->types = Type::latest()->get();
    }
    public function getTags()
    {
        return Tag::latest()->get();
    }
    public function getAreas()
    {
        $builder = new Area;
        if ($area = $this->query) {
            $builder = $builder->search($area);
        }
        return $builder->get();
    }

    public function createTask(CreateNewTasks $creator)
    {
        // dd($this->state);
        $this->resetErrorBag();

        $task = $creator->create(auth()->user(), $this->state);
        $this->state = [];
        $this->emit('refreshTasks');
        $this->emit('saved');
    }
    public function createNewOne(CreateNewTags $creator)
    {
        // dd($this->newOption);
        $tag = Tag::create([
            'name' => $this->newOption
        ]);
        $this->emit('refreshTags');
    }
    public function render()
    {
        return view('livewire.task.task-create-form');
    }
}
