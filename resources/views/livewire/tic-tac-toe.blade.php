<div>
    <div class="text-lg pb-4">
        <span class="font-black text-emerald-600">Current Turn:</span>
        <span class="font-semibold">Player {{ $currentPlayer }} -</span>
        <span class="font-black text-emerald-600">{{ $currentToken }}</span>
    </div>

    @if($winner)
        <div class="bg-emerald-600 text-white w-96 p-4 mb-4 font-black mx-auto rounded-xl">
            <p>Congratulations Player {{ $currentPlayer }}!</p>
            <p>You are the Winner!</p>
        </div>
    @endif

    @if($draw)
        <div class="bg-red-600 text-white w-96 p-4 mb-4 font-black mx-auto rounded-xl">
            <p>Commiserations! Player</p>
            <p>This game resulted in a draw!</p>
        </div>
    @endif

<div class="flex items-center justify-center">
    <div class="bg-gray-300 grid grid-cols-3 gap-8 p-8 w-96 rounded-xl">
        @for ($i = 0; $i <= 2; $i++)
            @for ($j = 0; $j <= 2; $j++)
                <button {{ $board[$i][$j] != '' ? 'disabled' : '' }} wire:click="playToken({{$i}},{{$j}})" class="bg-gray-200 h-24 w-24 shadow-xl rounded-xl border border-gray-300">
                    <div class="flex items-center justify-center h-full text-5xl font-black text-gray-500">
                        {{ $board[$i][$j] }}
                    </div>
                </button>
            @endfor
        @endfor
    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>
        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            encrypted: true
        });
    </script>
</div>