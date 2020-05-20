<?php

namespace Tests\Feature;

use App\Game;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamePhases extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function game_starts()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'invited' => [$user2->id, $user3->id],
            'players' => [$user2->id, $user3->id]
        ]);
    }
}
