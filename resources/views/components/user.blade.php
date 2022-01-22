<div x-data="{ expanded_menu : false }">

    <!-- User -->

    <div class="card flex-col p-3 mb-3  transition duration-300 bg-neutral-200 hover:ring-4 hover:ring-neutral-400 ease-in-out
    {{ $user->hasRole('administrator') ? " bg-red-400":"bg-teal-400" }}">
        <div class="flex justify-between">

            <div class="flex items-center">
                <div>
                    <img class="rounded-full mr-2" src="/images/ui/user.png" width="25" height="25" alt="">
                </div>
                <div>
                    {{$user->firstname}} {{$user->lastname}}
                </div>
            </div>

            <div class="flex items-center">
                <div class="mx-6">
                    {{$user->email}}
                </div>
                {{-- Hamburger button --}}
                <div @click="expanded_menu = !expanded_menu" class="font-bold btn-gray-xs hover:cursor-pointer">
                    <i class="fas fa-bars"></i>
                </div>
                {{-- Hamburger button --}}
            </div>

        </div>

        {{-- Alpinejs Buttons start --}}
        <div x-show="expanded_menu" x-collapse x-cloak class="flex-col justify-between my-2">


            <hr class="border-neutral-600 my-2">

            <div class="flex">
                <div class="mr-4">
                    ID #
                    <span class="font-bold text-sm">{{$user->id}}</span>
                </div>
                <div>
                    ULOGA :
                    <span class="font-bold text-sm">{{$user->roles()->first()->name}}</span>
                </div>

            </div>
            <div>
                NALOG KREIRAN :
                <span class="font-bold text-sm">{{$user->updated_at}} ({{Carbon\Carbon::parse($user->created_at)->diffForHumans()}})</span>
            </div>
            <div>
                STANJE :
                <span class="font-bold text-sm">{{$user->balance}} €</span>
            </div>

            <hr class="border-neutral-600 my-2">


            <div class="flex justify-start">
                <div class="mr-4">
                    {{-- job counter start --}}
                    @if($user->jobs->count()==0)
                    <a href="{{route('job.user',$user)}}">
                        <span class="text-shadow">
                            POSLOVI :
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-neutral-700 rounded-full">
                                {{$user->jobs->count()}}
                            </span>
                        </span>
                    </a>
                    @else
                    <a href="{{route('job.user',$user)}}">
                        <span class= text-shadow">
                            POSLOVI :
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{$user->jobs->count()}}
                            </span>
                        </span>
                    </a>
                    @endif
                    {{-- job counter end --}}
                </div>
                <div class="mr-4">
                    {{-- bid counter start --}}
                    @if($user->bids->count()==0)
                    <a href="{{route('bid.user',$user)}}">
                        <span class="text-shadow">
                            PONUDE :
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-neutral-700 rounded-full">
                                {{$user->bids->count()}}
                            </span>
                        </span>
                    </a>
                    @else
                    <a href="{{route('bid.user',$user)}}">
                        <span class= text-shadow">
                            PONUDE :
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{$user->bids->count()}}
                            </span>
                        </span>
                    </a>
                    @endif
                    {{-- bid counter end --}}
                </div>
                <div class="mr-4">
                    {{-- skill counter start --}}
                    @if($user->skills->count()==0)
                    <a href="{{route('skill.user',$user)}}">
                        <span class="text-shadow">
                            VEŠTINE :
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-neutral-700 rounded-full">
                                {{$user->skills->count()}}
                            </span>
                        </span>
                    </a>
                    @else
                    <a href="{{route('skill.user',$user)}}">
                        <span class= text-shadow">
                            VEŠTINE :
                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                {{$user->skills->count()}}
                            </span>
                        </span>
                    </a>
                    @endif
                    {{-- skill counter end --}}
                </div>
            </div>

            <hr class="border-neutral-600 my-2">

            <div>
                <a class="btn-green-small mr-2" href="{{route('user.edit',$user)}}">Izmeni</a>
                <a class="btn-red-small" href="{{route('user.destroy',$user)}}">Obriši</a>
            </div>
        </div>

        {{-- Alpinejs Buttons end --}}
    </div>

</div>
