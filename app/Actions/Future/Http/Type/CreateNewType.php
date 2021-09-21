<?php

namespace App\Actions\Future\Http\Type;


use App\Models\Type;
use Illuminate\Support\Facades\Validator;
use App\Actions\Future\Contracts\Type\CreateNewTypes;

class CreateNewType implements CreateNewTypes
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => 'required',
        ])->validate();

        $type = Type::create([
            'name' => $input['name'],
        ]);

        return $type;
    }
}