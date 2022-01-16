<div class="flex-col my-2 font-semibold text-md">

    <div class="flex-col" x-data="{ expanded_poslovi: $persist(false) }">

        <a @click="expanded_poslovi = !expanded_poslovi" class="block pl-12 py-2 items-end text-white bg-blue-600 shadow hover:opacity-100 hover:cursor-pointer hover:bg-blue-700 ">
            <i class="mr-1 fas fa-briefcase"></i>
            <span>Poslovi</span>
        </a>


        <div x-show="expanded_poslovi" x-collapse class="block text-sm  text-white text-center bg-neutral-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('job.index')}}">Svi poslovi</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('job.my')}}">Moji poslovi</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('job.create')}}">Objavi posao</a>
        </div>

    </div>

    @auth
    <div class="flex-col" x-data="{ expanded_ponude: $persist(false) }">

        <a @click="expanded_ponude = !expanded_ponude" class="block pl-12 py-2 items-end text-white bg-blue-600 shadow hover:opacity-100 hover:cursor-pointer hover:bg-blue-700 ">
            <i class="mr-1 fas fa-handshake"></i>
            <span>Ponude</span>
        </a>

        <div x-show="expanded_ponude" x-collapse class="block text-sm text-white text-center bg-neutral-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('bid.index')}}">Sve ponude</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('bid.user',auth()->user())}}">Poslate ponude</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.index')}}">Primljene ponude</a>
        </div>

    </div>
    @endauth


    <div class="flex-col" x-data="{ expanded_vestine: $persist(false) }">

        <a @click="expanded_vestine = !expanded_vestine" class="block pl-12 py-2 items-end text-white bg-blue-600 shadow hover:opacity-100 hover:cursor-pointer hover:bg-blue-700 ">
            <i class="mr-1 fas fa-book"></i>
            <span>Veštine</span>
        </a>

        <div x-show="expanded_vestine" x-collapse class="block text-sm text-white text-center bg-neutral-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('skill.index')}}">Sve veštine</a>
            @if(auth()->user())
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('skill.user',auth()->user())}}">Moje veštine</a>
            @endif
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('skill.create')}}">Unesi novu</a>
        </div>

    </div>

    <div class="flex-col" x-data="{ expanded_novac: $persist(false)}">

        <a @click="expanded_novac = !expanded_novac" class="block pl-12 py-2 items-end text-white bg-blue-600 shadow hover:opacity-100 hover:cursor-pointer hover:bg-blue-700 ">
            <i class="mr-1 fas fa-money-check-alt"></i>
            <span>Novac</span>
        </a>

        <div x-show="expanded_novac" x-collapse class="block text-sm text-white text-center bg-neutral-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.index')}}">Transakcije</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.index')}}">Uplata</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.index')}}">Isplata</a>
        </div>

    </div>

    <div class="flex-col" x-data="{ expanded_korisnici: $persist(false) }">

        <a @click="expanded_korisnici = !expanded_korisnici" class="block pl-12 py-2 items-end text-white bg-blue-600 shadow hover:opacity-100 hover:cursor-pointer hover:bg-blue-700 ">
            <i class="mr-1 fas fa-users"></i>
            <span>Korisnici</span>
        </a>

        <div x-show="expanded_korisnici" x-collapse class="block text-sm text-white text-center bg-neutral-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.index')}}">Svi korisnici</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.create')}}">Unesi novog</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-neutral-500" href="{{route('user.search')}}">Pretraga</a>
        </div>

    </div>

</div>
