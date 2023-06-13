<x-layout>
    <x-slot:title>
        Home
    </x-slot>

    <div class="space-y-4 text-center mb-8">
        @if(session()->has('error'))
            <div class="bg-red-500 w-full text-white py-1">Oops! {{ session('error') }}</div>
        @endif
        <h2 class="text-2xl text-emerald-600 font-bold">Welcome to Tic Tac Toe!</h2>
        <p class="text-md">
            Tic Tac Toe is a classic two-player game played on a 3x3 grid.
            The objective of the game is to get three of your own symbols (usually X or O)
            in a row, either horizontally, vertically, or diagonally, before your opponent does.
        </p>
    </div>
    <div class="space-y-4 text-center">
        <h2 class="text-2xl font-bold text-emerald-600">Ready To Play?</h2>
        <p>
            If a friend has sent you a code, please enter it below, before clicking on
            <span class="font-bold">Start Game</span>.
        </p>
        <p>
            Otherwise, please leave the game code field blank and click <span class="font-bold">Start Game</span>.
        </p>
        <form method="POST" action="/game/start">
            @csrf
            <div class="grid grid-cols-4 items-center">
                <label class="col-span-1 p-2 font-bold text-emerald-600 text-right" for="game">
                    Game Code
                </label>
                    <input class="placeholder:text-slate-400 col-span-3 bg-gray-50 border border-gray-300 rounded-lg p-2 focus:ring-green-500 focus:border-green-500" name="game" id="game" type="text" placeholder="Please enter your game code, if you have one!">
            </div>
            <button type="submit" class="mt-4 bg-emerald-600 px-8 py-4 text-2xl text-white rounded-lg">Start Game</button>
        </form>
    </div>
</x-layout>