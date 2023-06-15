<x-layout>
    <x-slot:title>
        Home
    </x-slot>
    <div class="space-y-4 text-center mb-8">
        <h2 class="text-2xl text-emerald-600 font-bold">Game: {{ $game->code }}</h2>
        <p class="text-md">
            Please send the above code to your friend to start the game!
        </p>
        <livewire:tic-tac-toe />
    </div>

    <div class="flex justify-center items-center">
        <a href="/">
            <button class="mt-4 bg-red-600 px-8 py-4 text-2xl text-white rounded-lg">End Game</button>
        </a>
    </div>
</x-layout>