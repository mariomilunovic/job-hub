
<div class="flex-col mb-3 p-2">
    <div class="">

        <x-title title="Pretraga korisnika"/>


        {{--        SEARCH INPUT       --}}
        <div class="mb-2">
            <input
            type="text"
            class="w-full input py-3"
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

