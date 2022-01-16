<div class="flex w-full items-center justify-between">

    {{-- left side --}}
    <div id="Logo" class="my-2 mx-4 justify-content-center">
        <a href="{{Route('page.home')}}">
            <img src="/images/ui/logo.png" alt="{{config('app.name','job-hub')}}" class="h-20">
        </a>
    </div>

    {{-- right side --}}
    <div class="flex">

        <div>
            @guest
            <a class="text-white text-sm font-bold bg-yellow-500 hover:bg-yellow-600 shadow rounded px-3 py-2 text-center mr-2" href="{{route('register.form')}}">Registracija</a>
            <a class="text-white text-sm font-bold bg-purple-500 hover:bg-purple-600 shadow rounded px-3 py-2 text-center mr-2" href="{{route('login.form')}}">Prijava</a>
            @endguest

        </div>

        @auth
        <div x-data="{ isOpen: false }" class="mr-4">

            <div class="relative flex items-center">

                <div class="pr-2 font-semibold text-white text-right">
                    {{ auth()->user()->firstname}}  {{ auth()->user()->lastname}}
                </div>

                <button @click="isOpen = !isOpen" class="z-50 w-12 h-12 overflow-hidden border-4 border-gray-400 rounded-full hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="/images/ui/user.png">
                </button>

                {{-- alpinejs menu --}}
                <div x-show="isOpen" class="z-50 absolute right-0 w-32 py-2 text-center bg-white rounded-lg shadow-lg top-14" x-cloak>
                    <a href="{{route('user.show',auth()->user())}}" class="block px-4 py-2 account-link hover:bg-blue-400">Profil</a>
                    <a href="{{route('logout.logout')}}" class="block px-4 py-2 account-link hover:bg-blue-400">Odjava</a>
                </div>

            </div>

        </div>
        @endauth


    </div>

</div>
