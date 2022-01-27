
<div x-data="{ expanded : {{$expanded ? 'true' : 'false'}}}">


    <!-- skill card start -->
    <div class="card flex-col py-3 px-3 mb-3 transition duration-300 bg-neutral-200 hover:ring-4 hover:ring-neutral-400 ease-in-out">


        <div class="flex items-center justify-between">

            <div class="flex-col text-xl font-bold items-center text-shadow">



                <div class="flex items-center justify-start">

                    <table>
                        <tr>
                            <td class="w-60">
                                <a href="{{route('skill.show',$skill)}}">{{$skill->name}}</a>
                            </td>
                            <td>
                                @auth
                                @if($user && $user->hasSkill($skill))

                                <div class="px-2 py-1 mx-4 text-xs font-bold  text-red-100 bg-red-600 whitespace-nowrap rounded-full">
                                    <span>{{$user->skills->where('id',$skill->id)->count()>0 ? 'MOJ':''}}</span>
                                    NIVO :  {{$user->skills->where('id',$skill->id)->first()->pivot->points}}
                                </div>

                                @endif
                                @endauth
                            </td>
                        </tr>




                    </table>
                </div>

            </div>

            {{-- Hamburger button --}}
            <div @click="expanded = !expanded" class="font-bold btn-gray-xs hover:cursor-pointer ">
                <i class="fas fa-bars"></i>
            </div>
            {{-- Hamburger button --}}


        </div>

        <div x-show="expanded" x-collapse x-cloak class="flex-col justify-between my-2" @click.outside="expanded = false" >

            <div class="text-xs">{{$skill->category->name}}</div>

            <hr class="border-neutral-600 my-2">

            <div class="flex justify-between items-center">
                <div class="flex">
                    {{-- jobs counter start--}}
                    <div class="mr-3">
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
                    <div class="">
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

                {{-- <div class="text-sm font-normal">
                    {{$skill->category->name}}
                </div> --}}

            </div>
            @auth
            @if($user->hasRole('administrator'))
            <hr class="border-neutral-600 my-4">

            <div>
                <a class="btn-green-small mr-2" href="{{route('skill.edit',$skill)}}">Izmeni</a>
                <a class="btn-red-small" href="{{route('user.destroy',$skill)}}">Obriši</a>
            </div>
            @endif
            @endauth

        </div>

    </div>

</div>

<!-- skill card start -->



