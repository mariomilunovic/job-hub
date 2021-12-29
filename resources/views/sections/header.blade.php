
{{-- left side --}}
<div id="Logo" class="ml-4 whitespace-nowrap">
    <a href="">
        <img src="/images/ui/fist.png" alt="Job-Hub logo" class="inline-block h-16 mr-3">

    </a>
    {{-- <span class="text-4xl font-bold text-white align-middle" style="text-shadow: 0 2px 4px rgba(0,0,0,0.40)">{{config('app.name','job-hub')}}</span> --}}
    <span class="text-4xl font-bold text-white align-middle text-shadow-md">{{config('app.name','job-hub')}}</span>
</div>


{{-- right side --}}

@guest
<ul class="flex">
    <li><a class="p-3 font-semibold text-white text-shadow" href="{{route('showRegisterForm')}}">Registracija</a></li>
    <li><a class="p-4 font-semibold text-white text-shadow" href="{{route('showLoginForm')}}">Prijava</a></li>
</ul>
@endguest


@auth
<div x-data="{ isOpen: false }" class="mr-4">
    <div class="relative flex items-center">
        <div class="pr-2 font-semibold text-white">{{ auth()->user()->firstname}}  {{ auth()->user()->lastname}}</div>
        <button @click="isOpen = !isOpen" class="z-50 w-12 h-12 overflow-hidden border-4 border-gray-400 rounded-full hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="/images/ui/user-icon.png">
        </button>

        <div x-show="isOpen" class="z-50 absolute right-0 w-32 py-2 text-center bg-white rounded-lg shadow-lg top-14">
            <a href="{{route('users.profile')}}" class="block px-4 py-2 account-link hover:bg-blue-400">Profil</a>
            <a href="{{route('logout')}}" class="block px-4 py-2 account-link hover:bg-blue-400">Odjava</a>
        </div>
    </div>
</div>
@endauth

