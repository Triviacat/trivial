<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function gamer_has_access_to_games()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/games');
        // $response->dumpHeaders();

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function gamer_can_access_game_creation_form()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->get('/games/create');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function gamer_can_create_a_private_game()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();

        $invited = [
            (object) ['id' => $user2->id, 'name' => $user2->name],
            (object) ['id' => $user3->id, 'name' => $user3->name],
        ];
        $chat = $this->faker->url;
        $password = $this->faker->word(25);

        $attributes = [
            'private' => true,
            'chat' => $chat,
            'password' => $password,
            'invited' => json_encode($invited),
            'user_id' => $user->id,
        ];

        $this->actingAs($user)
            ->post('/games', $attributes);

        // $this->dumpHeaders();
        $this->assertDatabaseHas('games', [
            'private' => true,
            'chat' => $chat,
            'password' => $password,
            'invited' => json_encode([$user2->id, $user3->id]),
            'user_id' => $user->id,
        ]);
    }

    /**
     * @test
     */
    public function gamer_can_create_a_public_game()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $attributes = [
            'private' => false,
            'chat' => null,
            'password' => null,
            'invited' => json_encode([]),
            'user_id' => $user->id,
        ];

        $this->actingAs($user)
            ->post('/games', $attributes);

        // $this->dumpHeaders();
        $this->assertDatabaseHas('games', $attributes);
    }
}
