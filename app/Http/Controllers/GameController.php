<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Creates a new game of tic tac toe
     */
    public function create(Request $request){
        dd($request->input('game'));
    }
}
