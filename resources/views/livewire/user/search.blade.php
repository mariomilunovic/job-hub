
<div class="p-6">

    {{--        TITLE              --}}
    <h2 class="text-xl font-bold text-gray-500">Pretraga korisnika</h2>
    <hr class="mb-2 border-2 border-gray-500 rounded drop-shadow">


    {{--        SEARCH INPUT       --}}
    <div class="py-2">
        <input
        type="text"
        class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500"
        name="query"
        placeholder="Unesite prezime"
        wire:model.debounce.150ms="query"
        />
    </div>


    {{--        SEARCH RESULTS     --}}
    @if(count($allUsers)>0)
    <div class="px-4 py-4 w-full shadow-lg rounded border border-gray-200 bg-gray-200">


        <table class="table-fixed p-6 w-full h-full">

            <thead class="text-sm font-semibold uppercase text-gray-500">
                <tr>
                    <th class="px-4 font-semibold text-left">Ime i Prezime</th>
                    <th class="px-4 font-semibold text-left">Email</th>
                    <th class="px-4 font-semibold text-left">Kreiran</th>
                    <th class="px-4 font-semibold text-left">Tip</th>
                    <th class="px-4 font-semibold text-left">Opcija</th>
                </tr>
            </thead>

            <tbody class="text-sm">

                @foreach ($allUsers as $user)

                <tr>
                    <td class="px-4 py-2">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="/images/ui/user-icon.png" width="25" height="25" alt=""></div>
                            <div class="font-medium">{{$user->firstname}} {{$user->lastname}}</div>
                        </div>
                    </td>

                    <td class="px-4 py-2">
                        <div class="text-left">{{$user->email}}</div>
                    </td>
                    <td class="px-4 py-2">
                        <div class="text-left">{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</div>
                    </td>
                    <td class="px-4 py-2" >
                        <div class="text-left">{{$user->roles()->first()->name}}</div>
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{route('user.show',$user)}}" class="w-full px-4 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">Prikaži</a>
                    </td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    @else
    <table class="table-fixed p-6 w-full h-full"></table>
    <span class="w-full">Nema pronađenih korisnika</span>
    @endif

</div>

