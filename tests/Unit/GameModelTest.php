<?php

namespace Tests\Unit;

use App\Models\Game;
use Illuminate\Support\Str;
use Tests\TestCase;

class GameModelTest extends TestCase
{
    private $code;

    public function setUp(): void
    {
        parent::setUp();

        $this->code = Str::random(8);

        $this->gameData = [
            'code' => $this->code,
        ];
    }

    public function test_game_can_be_created()
    {
        $game = Game::create($this->gameData);

        $this->assertEquals($this->code, $game->code);
    }

    public function test_game_can_be_retrieved()
    {
        $game = Game::create($this->gameData);

        $retrievedGame = Game::where('code', $this->code)->first();

        $this->assertInstanceOf(Game::class, $retrievedGame);
        $this->assertEquals($game->id, $retrievedGame->id);
        $this->assertEquals($game->code, $retrievedGame->code);
    }
}
