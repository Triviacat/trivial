<?php

namespace Tests\Unit;

use App\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $game = factory(Game::class)->make();

        $this->assertEquals('/games/' . $game->id, $game->path());
    }
}
