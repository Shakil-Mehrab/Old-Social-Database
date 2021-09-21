<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                "name" => "Live",
                "slug" => "live",
            ],
            [
                "name" => "Package",
                "slug" => "package",
            ],
            [
                "name" => "OOV",
                "slug" => "oov",
            ]
        ];

        foreach ($types as $type) {
            Type::create([
                'name' => $type['name'],
                'slug' => $type['slug']
            ]);
        }
    }
}