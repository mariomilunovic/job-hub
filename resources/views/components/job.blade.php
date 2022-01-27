<div x-data="{ show_menu : false }">
    <div x-data="{ show_user : false }" x-on:keydown.escape.prevent.stop="show_user = false">

        @include('modals.job_user')

        {{-- job card start --}}
        <div class="card flex-col transition duration-300 bg-neutral-400 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3 mb-3">

            {{-- Job header start --}}
            <div class="sm:flex justify-between mb-1">

                <div class="text-sm flex-col sm:flex text-white whitespace-nowrap">

                    @auth
                    <div class="flex items-center">

                        <div class="font-bold mr-2">POSLODAVAC :</div>

                        <a class="flex items-center" x-on:click="show_user = !show_user" href="#">

                            <span class="font-bold mr-2 text-shadow  {{ $job->user_id == auth()->user()->id ? "text-red-600":"text-neutral-600" }} ">{{$job->user->firstname}} {{$job->user->lastname}}</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                            </span>

                        </a>

                    </div>
                    @endauth

                    <div>
                        <span class="font-bold">VEŠTINA :</span>
                        <a href="{{route('skill.show',$job->skills->first())}}">
                            <span class="font-bold text-neutral-600 text-shadow">{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
                        </a>
                    </div>

                </div>

                <div class="text-sm text-white sm:text-right">

                    <div class="whitespace-nowrap items-center">

                        @switch($job->status->id)
                        @case(1)
                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_blue text-shadow">{{$job->status->name}}</span>
                        </div>
                        <span class="text-neutral-600 font-bold text-sm text-shadow">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$job->created_at}})</span>
                        </span>
                        @break

                        @case(2)
                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_red text-shadow">{{$job->status->name}}</span>
                        </div>
                        <span class="text-neutral-600 font-bold text-sm text-shadow">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($job->bid_selected_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$job->bid_selected_at}})</span>
                        </span>
                        @break

                        @case(3)
                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_green text-shadow">{{$job->status->name}}</span>
                        </div>
                        <span class="text-neutral-600 font-bold text-sm text-shadow">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($job->work_recieved_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$job->work_recieved_at}})</span>
                        </span>
                        @break

                        @case(4)
                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_black text-shadow">{{$job->status->name}}</span>
                        </div>
                        <span class="text-neutral-600 font-bold text-sm text-shadow">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($job->work_accepted_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$job->work_accepted_at}})</span>
                        </span>
                        @break
                        @endswitch
                    </div>

                </div>
            </div>

            {{-- Job header end --}}

            <hr class="border-neutral-600 my-2">

            {{-- Job description start --}}
            @if(strlen($job->description)>200)
            <div class="text-sm text-white mb-2" x-data="{ isCollapsed: false }">
                <span  x-text="isCollapsed ? '{{json_encode($job->description)}}': '{{json_encode(Str::limit($job->description,200))}}'"></span>
                <span  x-text="isCollapsed ? ' Sakrij tekst' : ' Prikaži ceo tekst'" x-on:click="isCollapsed = !isCollapsed" @click.outside="isCollapsed = false"  class="font-bold hover:cursor-pointer"></span>
            </div>
            @else
            <div class="text-sm text-white mb-2">
                <span>{{$job->description}}</span>
            </div>
            @endif
            {{-- Job description start --}}


            <hr class="border-neutral-600 my-2">


            {{-- Job footer start --}}
            <div class="flex text-sm text-white justify-between items-center">

                <div class="flex items-center sm:text-right">

                    {{-- Hamburger button --}}
                    @auth
                    <svg @click="show_menu = !show_menu" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 sm:w-8 sm:h-8 hover:cursor-pointer mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    @endauth
                    {{-- Hamburger button --}}

                    <div class="sm:flex">

                        <div>
                            <span class="font-bold">POSAO : </span>
                            <span class="font-bold text-neutral-600 text-shadow mr-6">ID#{{$job->id}}</span>
                        </div>

                        <div class="text-left sm:text-right">
                            <span class="font-bold">VREDNOST POSLA : </span>
                            <span class="font-bold text-neutral-600 text-shadow">{{$job->reward}}€</span>
                        </div>

                        <div class="text-left sm:text-right sm:ml-3">
                            <span class="font-bold">OČEKIVANI ROK :</span>
                            <span class="font-bold text-neutral-600 text-shadow">
                                @if ($job->days > 1)
                                {{$job->days}} dana
                                @else
                                {{$job->days}} dan
                                @endif
                            </span>
                        </div>



                        {{-- bid counter start --}}
                        @auth
                        <div class="sm:ml-3 ">

                            @if($job->bids->count()==0)

                            <a href="{{route('job.bids',$job)}}">
                                <span class="font-bold text-white text-shadow">
                                    PRIMLJENE PONUDE :
                                    <span class="inline-flex px-2 py-1 text-xs font-bold leading-none bg-neutral-700  rounded-full">
                                        {{$job->bids->count()}}
                                    </span>
                                </span>
                            </a>

                            @else

                            <a href="{{route('job.bids',$job)}}">
                                <span class="font-bold text-white text-shadow">
                                    PRIMLJENE PONUDE :
                                    {{-- oboji brojač zeleno ako sam konkurisao za posao --}}
                                    <span class="inline-flex px-2 py-1 text-xs font-bold leading-none {{$job->bids()->where('user_id',auth()->user()->id)->count() == 0 ? 'bg-red-500':'bg-green-600'}} rounded-full">
                                        {{$job->bids->count()}}
                                    </span>
                                </span>
                            </a>

                            @endif
                        </div>
                        @endauth
                        {{-- bid counter end --}}

                    </div>

                </div>

            </div>
            {{-- Job footer end --}}


            {{-- Alpinejs Buttons start --}}
            <div x-show="show_menu" x-collapse x-cloak class="flex justify-between my-2">
                @auth
                <div>
                    @if($job->bids->count()>0)
                    <a class="btn-orange-small" href="{{route('job.bids',$job)}}">Prikaži ponude</a>
                    @endif
                    @if($job->user_id != auth()->user()->id && $job->status_id == 1)
                    <a class="btn-orange-small" href="{{route('bid.create',$job)}}">Unesi ponudu</a>
                    @endif
                </div>

                <div>
                    @if($job->user_id == auth()->user()->id && $job->bids->count()==0)
                    <a class="btn-green-small mr-2" href="{{route('job.edit',$job)}}">Izmeni</a>
                    <a class="btn-red-small" href="{{route('job.destroy',$job)}}">Obriši</a>
                    @endif
                </div>
                @endauth

            </div>
            {{-- Alpinejs Buttons end --}}

        </div>
        {{-- job card end --}}

    </div>
</div>

