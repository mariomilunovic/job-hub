<div x-data="{ expanded_all: false }">


    <div class="sm:hidden flex justify-center items-center p-1">


        <button @click="expanded_all = !expanded_all" x-cloak>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>



    </div>


    {{-- big menu --}}
    <div :class="{ 'block' : expanded_all , 'hidden' : !expanded_all}" class="sm:block" x-cloak>
        <div class="flex flex-col justify-between flex-1 my-2">
            <nav>
                <div x-data="{ expanded_poslovi: $persist(false) }">
                    <a @click="expanded_poslovi = !expanded_poslovi"  class="flex justify-center py-2 menu_item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        <span class="mx-4 font-bold">Poslovi</span>
                    </a>
                    {{-- submenu_text --}}
                    <div x-show="expanded_poslovi"  x-collapse x-cloak class="text-sm text-center submenu_item">
                        <a class="submenu_text" href="{{route('job.index')}}">Svi poslovi</a>
                        <a class="submenu_text" href="{{route('job.my')}}">Moji poslovi</a>
                        <a class="submenu_text" href="{{route('job.create')}}">Objavi posao</a>
                    </div>
                </div>

                @auth
                <div x-data="{ expanded_ponude: $persist(false) }">
                    <a @click="expanded_ponude = !expanded_ponude" class="flex justify-center py-2 menu_item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>

                        <span class="mx-4 font-bold">Ponude</span>
                    </a>

                    <div x-show="expanded_ponude" x-collapse x-cloak class="text-sm text-center submenu_item">
                        <a class="submenu_text" href="{{route('bid.index')}}">Sve ponude</a>
                        <a class="submenu_text" href="{{route('bid.user',auth()->user())}}">Poslate ponude</a>
                        <a class="submenu_text" href="{{route('user.index')}}">Primljene ponude</a>
                    </div>
                </div>
                @endauth

                <div x-data="{ expanded_vestine: $persist(false) }">
                    <a @click="expanded_vestine = !expanded_vestine" class="flex justify-center py-2 menu_item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>

                        <span class="mx-4 font-bold">Veštine</span>
                    </a>

                    <div x-show="expanded_vestine"  x-collapse x-cloak class="text-sm text-center submenu_item">
                        <a class="submenu_text" href="{{route('skill.index')}}">Sve veštine</a>
                        @if(auth()->user())
                        <a class="submenu_text" href="{{route('skill.user',auth()->user())}}">Moje veštine</a>
                        @endif
                        <a class="submenu_text" href="{{route('skill.create')}}">Unesi novu</a>
                    </div>
                </div>


                {{-- NOVAC --}}

                @auth
                <div x-data="{ expanded_novac: $persist(false) }">
                    <a @click="expanded_novac = !expanded_novac" class="flex justify-center py-2 menu_item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>

                        <span class="mx-4 font-bold">Novac</span>
                    </a>


                    <div x-show="expanded_novac" x-collapse x-cloak class="text-sm text-center submenu_item">
                        <a class="submenu_text" href="{{route('deposit.create')}}">Uplata</a>
                        <a class="submenu_text" href="{{route('withdraw.create')}}">Isplata</a>

                        <a class="submenu_text" href="{{route('transaction.user',auth()->user())}}">Moje transakcije</a>


                        @if(auth()->user()->hasRole('administrator'))
                        <a class="submenu_text" href="{{route('transaction.index')}}">Sve transakcije</a>
                        @endif


                    </div>

                </div>
                @endauth

                {{-- KORISNICI --}}
                @auth
                <div x-data="{ expanded_korisnici: $persist(false) }">
                    <a @click="expanded_korisnici = !expanded_korisnici" class="flex justify-center py-2 menu_item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>

                        <span class="mx-4 font-bold">Korisnici</span>
                    </a>

                    <div x-show="expanded_korisnici" x-collapse x-cloak class="text-sm text-center submenu_item">
                        <a class="submenu_text" href="{{route('user.index')}}">Svi korisnici</a>
                        <a class="submenu_text" href="{{route('user.create')}}">Unesi novog</a>
                        <a class="submenu_text" href="{{route('user.search')}}">Pretraga</a>
                    </div>
                </div>
                @endauth

            </nav>

        </div>

    </div>
</div>
</div>
