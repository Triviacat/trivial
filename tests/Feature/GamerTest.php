<?php

namespace Tests\Feature;

use App\Game;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function gamer_has_access_to_games()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('games');
        // $response->dumpHeaders();

        $response->assertStatus(200);
    }

    /** @test */
    public function gamer_can_access_game_creation_form()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('games/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function gamer_can_create_a_private_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();

        $invited = [
            (object) ['id' => $user2->id, 'name' => $user2->name],
            (object) ['id' => $user3->id, 'name' => $user3->name],
        ];

        $attributes = factory(Game::class)->raw([
            'invited' => json_encode($invited),
            'user_id' => $user->id,
            'players' => json_encode([$user->id])
        ]);

        $this->actingAs($user)
            ->post('games', $attributes);

        $attributes['invited'] = json_encode([$user2->id, $user3->id]);
        $this->assertDatabaseHas('games', $attributes);
    }

    /** @test */
    public function gamer_can_create_a_public_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $attributes = factory(Game::class)->raw([
            'invited' => json_encode([]),
            'private' => '0',
            'user_id' => $user->id,
            'players' => json_encode([$user->id])
        ]);

        $this->actingAs($user)
            ->post('games', $attributes);

        $this->assertDatabaseHas('games', $attributes);
    }

    /** @test */
    public function host_can_open_a_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/open');

        $response->assertStatus(200);
    }

    /** @test */
    public function gamer_cannot_open_another_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user2)
            ->get($game->path() . '/open');

        $response->assertStatus(403);
    }

    /** @test */
    public function host_can_close_a_game()
    {
        $user = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/close');

        $response->assertStatus(200);
    }

    /** @test */
    public function gamer_cannot_close_another_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user2)
            ->get($game->path() . '/close');

        $response->assertStatus(403);
    }

    /** @test */
    public function host_can_edit_a_game()
    {
        $user = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/edit');
        $response->assertStatus(200);
    }

    /** @test */
    public function gamer_cannot_edit_another_game()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user2)
            ->get($game->path() . '/edit');

        $response->assertStatus(403);
    }

    /** @test */
    public function host_can_start_a_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'open',
            'players' => [$user->id]
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/start');

        $response->assertStatus(200);
    }

    /** @test */
    public function host_can_start_only_an_open_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'new',
            'players' => [$user->id]
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/start');

        $response->assertStatus(403);

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'over',
            'players' => [$user->id]
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/start');

        $response->assertStatus(403);

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'started',
            'players' => [$user->id]
        ]);

        $response = $this->actingAs($user)
            ->get($game->path() . '/start');

        $response->assertStatus(403);
    }

    /** @test */
    public function gamer_cannot_start_another_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'open',
            'players' => [$user->id]
        ]);

        $response = $this->actingAs($user2)
            ->get('/games/' . $game->id . '/start');

        $response->assertStatus(403);
    }

    /** @test */
    public function gamer_cannot_join_a_game_again()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'open',
            'players' => [$user->id]
        ]);
        $response = $this->actingAs($user)
            ->get('/games/' . $game->id . '/join');
        $response->assertStatus(403);
    }

    /** @test */
    public function gamer_cannot_join_an_over_or_new_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'private' => false,
            'user_id' => $user->id,
            'status' => 'over',
            'players' => [$user->id]
        ]);
        $response = $this->actingAs($user2)
            ->get('/games/' . $game->id . '/join');
        $response->assertStatus(403);
    }

    /** @test */
    public function gamer_can_join_a_public_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'private' => false,
            'user_id' => $user->id,
            'status' => 'open',
        ]);
        $response = $this->actingAs($user)
            ->get('/games/' . $game->id . '/join');
        $response->assertStatus(200);
    }

    /** @test */
    public function gamer_cannot_join_a_private_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'open',
            'invited' => []
        ]);
        $response = $this->actingAs($user2)
            ->get('/games/' . $game->id . '/join');
        $response->assertStatus(403);
    }

    /** @test */
    public function invited_gamer_can_join_a_private_game()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $invited = [$user2->id];
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
            'status' => 'open',
            'invited' => $invited
        ]);
        $response = $this->actingAs($user2)
            ->get('/games/' . $game->id . '/join');
        $response->assertStatus(200);
    }

    /** @test */
    public function host_cannot_leave_his_own_game()
    {
        $user = factory(User::class)->create();
        $game = factory(Game::class)->create([
            'user_id' => $user->id,
        ]);
        $response = $this->actingAs($user)
            ->get('/games/' . $game->id . '/leave');
        $response->assertStatus(403);
    }
}
