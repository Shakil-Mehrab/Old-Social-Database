<?php

namespace App\Actions\Future\Contracts\Task;

interface CreateNewTasks
{
    public function create($user, array $input);
}