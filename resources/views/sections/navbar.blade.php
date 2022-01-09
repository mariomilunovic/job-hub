<div class="flex flex-col mt-5 font-semibold justify-items-center text-md">

    <div x-data="{ expanded_poslovi: $persist(false) }">

        <button @click="expanded_poslovi = !expanded_poslovi" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-briefcase"></i>
            Poslovi
        </button>

        <div x-show="expanded_poslovi" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('job.index')}}">Svi poslovi</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Moji poslovi</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('job.create')}}">Objavi posao</a>
        </div>

    </div>

    <div x-data="{ expanded_ponude: $persist(false) }">

        <button @click="expanded_ponude = !expanded_ponude" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-handshake"></i>
            Ponude
        </button>

        <div x-show="expanded_ponude" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Poslate ponude</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Primljene ponude</a>
        </div>

    </div>


    <div x-data="{ expanded_vestine: $persist(false) }">

        <button @click="expanded_vestine = !expanded_vestine" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-book"></i>
            Veštine
        </button>

        <div x-show="expanded_vestine" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('skill.index')}}">Sve veštine</a>
            @if(auth()->user())
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('skill.user',auth()->user())}}">Moje veštine</a>
            @endif
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('skill.create')}}">Unesi novu</a>
        </div>

    </div>

    <div x-data="{ expanded_novac: $persist(false)}">

        <button @click="expanded_novac = !expanded_novac" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-money-check-alt"></i>
            Novac
        </button>

        <div x-show="expanded_novac" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Transakcije</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Uplata</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Isplata</a>
        </div>

    </div>

    <div x-data="{ expanded_korisnici: $persist(false) }">

        <button @click="expanded_korisnici = !expanded_korisnici" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-users"></i>
            Korisnici
        </button>

        <div x-show="expanded_korisnici" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.index')}}">Svi korisnici</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.create')}}">Unesi novog</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('user.search')}}">Pretraga</a>

        </div>

    </div>

</div>
