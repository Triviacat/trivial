<?php

namespace Tests\Feature;

use App\Events\EnableDiceButton;
use App\Events\GameStatusHasChanged;
use App\Events\NotifyMessage;
use App\Events\NotifyWhosTurn;
use App\Game;
use App\Turn;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamePhases extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function game_starts()
    {
        Event::fake();

        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'invited' => [$user2->id, $user3->id],
            'players' => [$user2->id, $user3->id],
            'status' => 'open'
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/start');

        $response->assertStatus(200);

        $this->assertDatabaseHas('games', [
            'id' => $game->id,
            'status' => 'started'
        ]);

        Event::assertDispatched(GameStatusHasChanged::class);

        //start a new turn
        $turn = factory(Turn::class)->create([
            'game_id' => $game->id,
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('turns', [
            'id' => $turn->id,
            'game_id' => $game->id,
            'user_id' => $user->id,
            'step' => 'dice',
            'box_id' => 1
        ]);

        Event::assertDispatched(NotifyWhosTurn::class);
        Event::assertDispatched(NotifyMessage::class);
        Event::assertDispatched(EnableDiceButton::class);
    }
}
