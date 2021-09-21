<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\Future\Http\Tag\UpdateTag;
use App\Actions\Future\Http\Task\UpdateTask;
use App\Actions\Future\Http\Type\UpdateType;
use App\Actions\Future\Http\Tag\CreateNewTag;
use App\Actions\Future\Http\Task\CreateNewTask;
use App\Actions\Future\Http\Type\CreateNewType;
use App\Actions\Future\Contracts\Tag\UpdateTags;
use App\Actions\Future\Contracts\Task\UpdateTasks;
use App\Actions\Future\Contracts\Type\UpdateTypes;
use App\Actions\Future\Contracts\Tag\CreateNewTags;
use App\Actions\Future\Contracts\Task\CreateNewTasks;
use App\Actions\Future\Contracts\Type\CreateNewTypes;

class FutureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Task
        app()->singleton(CreateNewTasks::class, CreateNewTask::class);
        app()->singleton(UpdateTasks::class, UpdateTask::class);
        // Type
        app()->singleton(CreateNewTypes::class, CreateNewType::class);
        app()->singleton(UpdateTypes::class, UpdateType::class);
        // Type
        app()->singleton(CreateNewTags::class, CreateNewTag::class);
        app()->singleton(UpdateTags::class, UpdateTag::class);
    }
}