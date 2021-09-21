<?php

namespace App\Http\Livewire\Task;

use App\Models\Tag;
use App\Models\Task;
use App\Models\Type;
use Livewire\Component;
use App\Platform\Platform;
use App\Actions\Future\Contracts\Task\UpdateTasks;

class TaskListItem extends Component
{
    public $task;
    public $staticPlatforms;
    public $tags;
    public $types;
    public $state = [];
    public $showingTaskEditModal;
    public $showingTaskDeleteModal;
    public $selectedTasks = [];

    public function mount(Task $task)
    {
        $this->tags = Tag::latest()->get();
        $this->types = Type::latest()->get();
        $this->staticPlatforms = Platform::$platforms;
        $this->state = Task::where('id', $task->id)->get()->map(function ($task) {
            return [
                'title' => $task->title,
                'platform1' => $task->platform1,
                'platform2' => $task->platform2,
                'platform3' => $task->platform3,
                'types' => $task->types->pluck('id', 'name')->toArray(),
                'tags' => $task->tags->pluck('id')->toArray(),
            ];
        })->first();
    }

    public function updateTask(UpdateTasks $updater)
    {
        $this->resetErrorBag();
        $updater->update($this->task, $this->state);
        $this->emit('refreshTasks');
        $this->showingTaskEditModal = null;
    }
    public function deleteTask()
    {
        $this->task->delete();
        $this->showingTaskDeleteModal = null;
        $this->emit('refreshTasks');
    }

    public function render()
    {
        return view('livewire.task.task-list-item');
    }
}
