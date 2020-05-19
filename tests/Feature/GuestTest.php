<?php

namespace Tests\Feature;

use Tests\TestCase;

class GuestTest extends TestCase
{
    /**
     * @test
     */
    public function guest_needs_login()
    {
        $response = $this->get('/games');
        // $response->dumpHeaders();
        // $response->dumpSession();
        $response->assertStatus(302);
        // $response->assertGuest($guard = null);
    }
}
