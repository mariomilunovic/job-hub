<div class="flex flex-col mt-5 font-semibold justify-items-center text-md">

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-briefcase"></i>
            Poslovi
        </button>

        <div x-show="expanded" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('jobs.index')}}">Svi poslovi</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Moji poslovi</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Objavi posao</a>
        </div>

    </div>

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-handshake"></i>
            Ponude
        </button>

        <div x-show="expanded" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Poslate ponude</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Primljene ponude</a>
        </div>

    </div>


    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-book"></i>
            Veštine
        </button>

        <div x-show="expanded" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('skills.index')}}">Sve veštine</a>
            @if(auth()->user())
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('skills.user',auth()->user())}}">Moje veštine</a>
           @endif
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('skills.create')}}">Unesi novu</a>
        </div>

    </div>

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-money-check-alt"></i>
            Novac
        </button>

        <div x-show="expanded" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Transakcije</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Uplata</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Isplata</a>
        </div>

    </div>

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full py-2 text-white bg-blue-600 shadow hover:opacity-100 hover:bg-blue-700 ">
            <i class="mr-1 fas fa-users"></i>
            Korisnici
        </button>

        <div x-show="expanded" x-collapse class="text-sm text-center text-white bg-gray-600" x-cloak>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.index')}}">Svi korisnici</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.create')}}">Unesi novog</a>
            <a class="block py-2 transition duration-500 ease-in-out hover:bg-gray-500" href="{{route('users.search')}}">Pretraga</a>

        </div>

    </div>

</div>
