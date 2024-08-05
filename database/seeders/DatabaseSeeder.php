<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $p1x = User::create([
            'name' => 'pikachu',
        ]);

        $p2o = User::create([
            'name' => 'eevee',
        ]);

        // Create game with user IDs
        $game = Game::create([
            'p1x_id' => $p1x->id,
            'p2o_id' => $p2o->id,
            'pass' => '1234',
            'status' => 'init',
        ]);

        // Update users to associate them with the game
        $p1x->update(['game_id' => $game->id]);
        $p2o->update(['game_id' => $game->id]);
    }
}
