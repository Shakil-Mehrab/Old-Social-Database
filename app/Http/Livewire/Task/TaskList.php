<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class TaskList extends Component
{
    use WithPagination;
    public $paginate;
    public $query;
    public $selectAll = false;
    public $selectedTasks = [];
    protected $listeners = ['refreshTasks' => '$refresh'];

    public function mount($paginate = 5)
    {
        $this->paginate = $paginate;
    }

    public function tasks()
    {
        $builder = new Task;

        if ($this->query) {
            $builder = $builder->search($this->query);
        }
        return $builder->paginate($this->paginate);
    }
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedTasks = Task::pluck('id');
        } else {
            $this->selectedTasks = [];
        }
    }
    public function render()
    {
        return view('livewire.task.task-list');
    }
}
