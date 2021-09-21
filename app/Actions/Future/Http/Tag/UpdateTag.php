<?php

namespace App\Actions\Future\Http\Tag;


use Illuminate\Support\Facades\Validator;
use App\Actions\Future\Contracts\Tag\UpdateTags;

class UpdateTag implements UpdateTags
{
    public function update($type, array $input)
    {
        Validator::make($input, [
            'name' => 'required',
        ])->validate();

        $type->update([
            'name' => $input['name'],
        ]);

        return $type;
    }
}