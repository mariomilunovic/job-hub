<div class="flex flex-col justify-items-center text-md font-semibold mt-5">

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full text-white drop-shadow-md shadow hover:opacity-100 bg-blue-600 hover:bg-blue-700 py-2 ">
            <i class="fas fa-briefcase mr-1"></i>
            Poslovi
        </button>

        <div x-show="expanded" x-collapse class="text-white text-sm text-center bg-gray-600">
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Svi poslovi</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Moji poslovi</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Objavi posao</a>
        </div>

    </div>

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full text-white drop-shadow-md shadow hover:opacity-100 bg-blue-600 hover:bg-blue-700 py-2 ">
            <i class="fas fa-handshake mr-1"></i>
            Ponude
        </button>

        <div x-show="expanded" x-collapse class="text-white text-sm text-center bg-gray-600">
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Poslate ponude</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Primljene ponude</a>
        </div>

    </div>


    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full text-white drop-shadow-md shadow hover:opacity-100 bg-blue-600 hover:bg-blue-700 py-2 ">
            <i class="fas fa-book mr-1"></i>
            Veštine
        </button>

        <div x-show="expanded" x-collapse class="text-white text-sm text-center bg-gray-600">
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Sve veštine</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Moje veštine</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Unesi novu</a>
        </div>

    </div>

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full text-white drop-shadow-md shadow hover:opacity-100 bg-blue-600 hover:bg-blue-700 py-2 ">
            <i class="fas fa-money-check-alt mr-1"></i>
            Novac
        </button>

        <div x-show="expanded" x-collapse class="text-white text-sm text-center bg-gray-600">
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Transakcije</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Uplata</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Isplata</a>
        </div>

    </div>

    <div x-data="{ expanded: false }">

        <button @click="expanded = !expanded" class="w-full text-white drop-shadow-md shadow hover:opacity-100 bg-blue-600 hover:bg-blue-700 py-2 ">
            <i class="fas fa-users mr-1"></i>
            Korisnici
        </button>

        <div x-show="expanded" x-collapse class="text-white text-sm text-center bg-gray-600">
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Svi korisnici</a>
            <a class="block hover:bg-gray-500 py-2" href="{{route('users.index')}}">Unesi novog</a>

        </div>

    </div>

</div>
