<?php

namespace App\Actions\Future\Http\Task;

use App\Platform\Platform;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Actions\Future\Contracts\Task\CreateNewTasks;

class CreateNewTask implements CreateNewTasks
{
    public function create($user, array $input)
    {
        $validatedData = Validator::make($this->filteredArray($input), [
            'title' => 'required',
            'platforms' => 'required|array',
            'platforms.*' => 'required|url',
            'types' => 'required|array',
            'tags' => 'required|array',
        ])->validate();

        $task = $user
            ->tasks()
            ->create(
                [
                    'title' => $validatedData['title'],
                    'platform1' => $validatedData['platforms'][1] ?? null,
                    'platform2' => $validatedData['platforms'][2] ?? null,
                    'platform3' => $validatedData['platforms'][3] ?? null,

                ]
            );

        if (array_key_exists('types', $input) && $types = $this->filteredArray($input['types'])) {
            $task->types()->sync($types);
        } else {
            $task->types()->detach();
        }
        if (array_key_exists('tags', $input) && $tags = $this->filteredArray($input['tags'])) {
            $task->tags()->sync($tags);
        } else {
            $task->tags()->detach();
        }
        return $task;
    }

    protected function filteredArray($request)
    {
        return array_filter($request);
    }
}
