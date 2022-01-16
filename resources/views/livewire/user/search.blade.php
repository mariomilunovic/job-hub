
<div class="flex-col mb-3 p-2">
    <div class="">

        <x-title title="Pretraga korisnika"/>


        {{--        SEARCH INPUT       --}}
        <div class="mb-2">
            <input
            type="text"
            class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
            name="query"
            placeholder="Unesite prezime"
            wire:model.debounce.150ms="query"
            autofocus
            />
        </div>


        {{--        SEARCH RESULTS     --}}
        @if(count($allUsers)>0)

        @foreach ($allUsers as $user)
        <x-user :user="$user"/>
        @endforeach

        @else
        <div class="">Nema pronađenih korisnika</div>
        @endif
    </div>

</div>

