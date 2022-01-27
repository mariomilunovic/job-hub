<div x-data="{ expanded_menu : false }">

    {{-- job card start --}}
    <div class="card flex-col  transition duration-300 sm:w-800 bg-neutral-400 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3 mb-3">

        {{-- Job header start --}}
        <div class="sm:flex justify-between mb-1">

            <div class="text-sm flex-col sm:flex text-white whitespace-nowrap">
                <div class="sm:flex">
                    <div>
                        <span class="font-bold">POSAO : </span>
                        <span class="font-bold text-neutral-600 text-shadow mr-6">ID#{{$job->id}}</span>
                    </div>
                    <div>
                        <span class="font-bold ">POSLODAVAC :</span>
                        <span class="font-bold text-shadow text-neutral-600 @auth{{ $job->user_id == auth()->user()->id ? " text-red-500":"text-neutral-600" }} @endauth">{{$job->user->firstname}} {{$job->user->lastname}}</span>
                    </div>
                </div>
                <div>
                    <span class="font-bold">VEŠTINA :</span>
                    <span class="font-bold text-neutral-600 text-shadow">{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
                </div>
            </div>

            <div class="text-sm text-white justify-items-end sm:text-left sm:text-right">

                <div class="whitespace-nowrap">

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
        <div class="flex text-sm text-white justify-between items-end">

            {{-- Hamburger button --}}
            @auth
            <div @click="expanded_menu = !expanded_menu" class="font-bold btn-gray-xs hover:cursor-pointer mr-3  items-center">
                <i class="fas fa-bars"></i>
            </div>
            @endauth
            {{-- Hamburger button --}}

            <div class="sm:flex">

                <div class="sm:flex ">

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

                </div>

                {{-- bid counter start --}}
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
                {{-- bid counter end --}}

            </div>

        </div>
        {{-- Job footer end --}}


        {{-- Alpinejs Buttons start --}}
        <div x-show="expanded_menu" x-collapse x-cloak class="flex justify-between my-2">
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
