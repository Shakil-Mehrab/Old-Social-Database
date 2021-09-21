<?php

namespace App\Observers;

use App\Models\Type;
use Illuminate\Support\Str;

class TypeObserver
{

    /**
     * creating
     *
     * @param  mixed $type
     * @return void
     */
    public function creating(Type $type)
    {
        $type->uuid = Str::uuid();
        $type->slug = Str::slug($type->name);
    }


    /**
     * updated
     *
     * @param  mixed $type
     * @return void
     */
    public function updated(Type $type)
    {
        //
    }
}