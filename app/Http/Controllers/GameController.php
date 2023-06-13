<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Starts the process to create or join a game of Tic Tac Toe.
     * This function is called when a user clicks "Start Game".
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function start(Request $request)
    {
        $gameCodeInput = $request->input('game');
        if (is_null($gameCodeInput)) {
            return redirect()->route('create');
        }

        return redirect()->route('join', ['code' => $gameCodeInput]);
    }

    /**
     * Creates a new game of Tic Tac Toe, along with the game code
     * which can then be sent to other players.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $game = Game::create([
            'code' => Str::random(8)
        ]);

        return redirect()->route('play', ['code' => $game->code]);
    }

    /**
     * Join a game of Tic Tac Toe. If the game does not exist, redirect to
     * the home page.
     */
    public function join($code)
    {
        $game = Game::where('code', $code)->first();

        if (is_null($game)) {
            return redirect()->route('home')->with('error', 'No game exists for this code. Please Try Again!');
        }

        return redirect()->route('play', ['code' => $game->code]);
    }

    /**
     * Display the view to play the game of Tic Tac Toe.
     *
     * @param $code
     */
    public function play($code)
    {
        $game = Game::where('code', $code)->first();

        if (is_null($game)) {
            return redirect()->route('home')->with('error', 'No game exists for this code. Please Try Again!');
        }

        return view('game', compact('game'));
    }
}
