<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                "name" => "Facebook & Youtube's Team",
                "slug" => "facebook-&-youtubes-team",
                "user_id" => 1,
                "personal_team" => 0
            ],
            [
                "name" => "Websites's Team",
                "slug" => "websites-team",
                "user_id" => 2,
                "personal_team" => 0
            ],

        ];

        foreach ($teams as $team) {
            Team::create([
                'name' => $team['name'],
                'slug' => $team['slug'],
                'user_id' => $team['user_id'],
                'personal_team' => $team['personal_team'],
            ]);
        }
    }
}
