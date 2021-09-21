<?php

namespace App\Actions\Future\Http\Type;


use Illuminate\Support\Facades\Validator;
use App\Actions\Future\Contracts\Type\UpdateTypes;

class UpdateType implements UpdateTypes
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