<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagObserver
{
    /**
     * creating
     *
     * @param  mixed $tag
     * @return void
     */
    public function creating(Tag $tag)
    {
        $tag->uuid = Str::uuid();
        $tag->slug = Str::slug($tag->name);
    }


    /**
     * updated
     *
     * @param  mixed $tag
     * @return void
     */
    public function updated(Tag $tag)
    {
        //
    }
}