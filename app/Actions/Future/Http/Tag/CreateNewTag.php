<?php

namespace App\Actions\Future\Http\Tag;



use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use App\Actions\Future\Contracts\Tag\CreateNewTags;

class CreateNewTag implements CreateNewTags
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => 'required',
        ])->validate();

        $tag = Tag::create([
            'name' => $input['name'],
        ]);

        return $tag;
    }
}