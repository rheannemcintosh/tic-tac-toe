<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Game;

class GameTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test, to check a user can create a game of tic tac toe with no code
     */
    public function test_user_can_create_game_with_no_code(): void
    {
        // Get the home page URL & check the status is successful
        $response = $this->get('/');
        $response->assertStatus(200);

        // Get the response from the start URL, where there is no game code
        $response = $this->post('/game/start', [
            'game' => null
        ]);

        // Check the original DB count is 0
        $this->assertEquals(0, Game::count());

        // Check the user is redirect to the create route
        $response->assertRedirect('/game/create');

        // Execute the create() method
        $response = $this->get('/game/create');

        // Check the DB count is now 1
        $this->assertEquals(1, Game::count());

        // Assert that the response is a redirect
        $response->assertRedirect();

        // Get the first game, and check it redirects to the play route
        $game = Game::first();
        $response->assertRedirect(route('play', ['code' => $game->code]));
    }
}
