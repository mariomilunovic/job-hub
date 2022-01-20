
<div x-data="{ expanded_menu : false }">


    <!-- skill card start -->
    <div class="card flex-col py-3 px-3 mb-3 gradient_silver transition duration-300 bg-neutral-200 hover:ring-4 hover:ring-neutral-400 ease-in-out">


        <div class="flex items-center justify-between">

            <div class="text-xl font-bold text-shadow">
                <div class="text-xs font-normal">{{$skill->category->name}}</div>
                <a href="{{route('skill.show',$skill)}}">{{$skill->name}}  </a>
            </div>

            <div class="flex items-center">
                <div class="text-xl text-white text-shadow-md mr-4">
                    @if(auth()->user()->hasSkill($skill->name))
                    NIVO : {{auth()->user()->skills->where('id',$skill->id)->first()->pivot->points}}
                    @endif
                </div>

                {{-- Hamburger button --}}
                <div @click="expanded_menu = !expanded_menu" class="font-bold btn-gray-xs hover:cursor-pointer ">
                    <i class="fas fa-bars"></i>
                </div>
                {{-- Hamburger button --}}
            </div>

        </div>

        <div x-show="expanded_menu" x-collapse x-cloak class="flex-col justify-between my-2">

            <hr class="border-neutral-600 my-2">

            <div class="flex justify-between">
                <div class="flex">
                    {{-- jobs counter start--}}
                    <div class="text-right mr-3">
                        @if($skill->jobs->count()==0)
                        <a href="#">
                            <span class="text-shadow">
                                Poslovi :
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-neutral-700 rounded-full">
                                    {{$skill->jobs->count()}}
                                </span>
                            </span>
                        </a>
                        @else
                        <a href="{{route('job.skill',$skill)}}">
                            <span class= text-shadow">
                                Poslovi :
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    {{$skill->jobs->count()}}
                                </span>
                            </span>
                        </a>
                        @endif
                    </div>
                    {{-- jobs counter end--}}

                    {{-- users counter start--}}
                    <div class="text-right">
                        @if($skill->users->count()==0)
                        <a href="#">
                            <span class="text-shadow">
                                Korisnici :
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-neutral-700 rounded-full">
                                    {{$skill->jobs->count()}}
                                </span>
                            </span>
                        </a>
                        @else
                        <a href="{{route('user.skill',$skill)}}">
                            <span class= text-shadow">
                                Korisnici :
                                <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    {{$skill->users->count()}}
                                </span>
                            </span>
                        </a>
                        @endif
                    </div>
                    {{-- users counter end--}}
                </div>

            </div>

            @if(auth()->user()->hasRole('administrator'))
            <hr class="border-neutral-600 my-4">

            <div>
                <a class="btn-green-small mr-2" href="{{route('skill.edit',$skill)}}">Izmeni</a>
                <a class="btn-red-small" href="{{route('user.destroy',$skill)}}">Obriši</a>
            </div>
            @endif

        </div>

    </div>

</div>

<!-- skill card start -->



