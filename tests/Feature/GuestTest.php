<?php

namespace Tests\Feature;

use Tests\TestCase;

class GuestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest_needs_login()
    {
        $response = $this->get('/games');
        // $response->dumpHeaders();
        // $response->dumpSession();
        $response->assertStatus(302);
        // $response->assertGuest($guard = null);
    }
}
