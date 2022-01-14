
{{-- left side --}}
<div id="Logo" class="ml-4 whitespace-nowrap">
    <a href="{{Route('page.home')}}">
        <img src="/images/ui/logo.png" alt="Job-Hub logo" class="inline-block h-20 mx-2">

    </a>
    {{-- <span class="text-4xl font-bold text-white align-middle text-shadow-md">{{config('app.name','job-hub')}}</span> --}}
</div>


{{-- right side --}}

@guest
<ul class="flex">
    <li><a class="text-white text-sm font-bold bg-yellow-500 hover:bg-yellow-600 shadow rounded px-3 py-2 text-center mr-2 mb-2" href="{{route('register.form')}}">Registracija</a></li>
    <li><a class="text-white text-sm font-bold bg-purple-500 hover:bg-purple-600 shadow rounded px-3 py-2 text-center mr-4 mb-2" href="{{route('login.form')}}">Prijava</a></li>
</ul>
@endguest


@auth
<div x-data="{ isOpen: false }" class="mr-4">
    <div class="relative flex items-center">
        <div class="pr-2 font-semibold text-white">{{ auth()->user()->firstname}}  {{ auth()->user()->lastname}}</div>
        <button @click="isOpen = !isOpen" class="z-50 w-12 h-12 overflow-hidden border-4 border-gray-400 rounded-full hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="/images/ui/user.png">
        </button>

        <div x-show="isOpen" class="z-50 absolute right-0 w-32 py-2 text-center bg-white rounded-lg shadow-lg top-14" x-cloak>
            <a href="{{route('user.show',auth()->user())}}" class="block px-4 py-2 account-link hover:bg-blue-400">Profil</a>
            <a href="{{route('logout.logout')}}" class="block px-4 py-2 account-link hover:bg-blue-400">Odjava</a>
        </div>
    </div>
</div>
@endauth

