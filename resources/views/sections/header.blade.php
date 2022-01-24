<div class="flex w-full items-center justify-between">

    {{-- left side --}}
    <div id="Logo" class="my-2 mx-4 justify-content-center">
        <a href="{{Route('page.dashboard')}}">
            <img src="/images/ui/logo.png" alt="{{config('app.name','job-hub')}}" class="w-36 sm:w-52">
        </a>
    </div>

    {{-- right side --}}
    <div class="flex">

        <div class="flex">
            @guest
            <a class="btn-amber-small mr-3" href="{{route('register.form')}}">Registracija</a>
            <a class="btn-green-small mr-3" href="{{route('login.form')}}">Prijava</a>
            @endguest

        </div>

        @auth
        <div x-data="{ isOpen: false }" class="mr-6">

            <div class="relative flex items-center">
                <div class="pr-2 font-semibold text-white text-right invisible sm:visible ">
                    {{ auth()->user()->firstname}}  {{ auth()->user()->lastname}}
                </div>
                <button x-on:click="isOpen = !isOpen" class="z-50 w-10 sm:w-12 overflow-hidden  border-4 border-gray-400 rounded-full transition duration-500 hover:scale-105 hover:border-gray-300 focus:border-gray-1 00 focus:outline-none">
                    <img src="/images/ui/user.png">
                </button>

                {{-- alpinejs menu --}}
                <div x-show="isOpen" @click.outside="isOpen = false"  class="z-50 absolute right-0 w-32 py-2 text-center bg-white rounded-lg shadow-lg top-14" x-cloak>
                    <a href="{{route('user.show',auth()->user())}}" class="block px-4 py-2 account-link hover:bg-blue-400">Profil</a>
                    <a href="{{route('logout.logout')}}" class="block px-4 py-2 account-link hover:bg-blue-400">Odjava</a>
                </div>

            </div>

        </div>
        @endauth


    </div>

</div>
