<div x-data="{ expanded_menu : false }">

    {{-- job card start --}}
    <div class="card flex-col gradient_gray transition duration-300 bg-neutral-500 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3 mb-3">

        {{-- Job header start --}}
        <div class="sm:flex justify-between mb-1 items-center">

            <div class="text-sm text-white whitespace-nowrap">
                <div>
                    <span class="font-bold">POSAO : </span>
                    <span class="font-bold text-yellow-500 text-shadow mr-6">ID#{{$job->id}}</span>
                    <span class="font-bold ">POSLODAVAC :</span>
                    <span class="font-bold text-shadow {{ $job->user_id == auth()->user()->id ? " text-red-400":"text-yellow-500 " }}">{{$job->user->firstname}} {{$job->user->lastname}}</span>
                </div>
                <div>
                    <span class="font-bold">VEŠTINA :</span>
                    <span class="font-bold text-yellow-500 text-shadow">{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
                </div>
            </div>

            <div class="text-sm text-white justify-items-end sm:text-right">

                <div class="whitespace-nowrap font-bold">
                    POSLEDNJA PROMENA :
                    @switch($job->status->id)
                    @case(1)
                    <span class="text-yellow-500 text-shadow">{{$job->created_at}}</span>
                    @break

                    @case(2)
                    <span class="text-yellow-500 text-shadow">{{$job->bid_selected_at}}</span>
                    @break

                    @case(3)
                    <span class="text-yellow-500 text-shadow">{{$job->work_recieved_at}}</span>
                    @break

                    @case(4)
                    <span class="text-yellow-500 text-shadow">{{$job->work_accepted_at}}</span>
                    @break
                    @endswitch
                </div>
                <div>
                    <span class="font-bold">STATUS :</span> <span class="font-bold text-yellow-500 text-shadow">{{$job->status->name}}</span>
                </div>
            </div>
        </div>
        {{-- Job header end --}}

        <hr class="border-neutral-600 my-2">

        {{-- Job description start --}}
        @if(strlen($job->description)>200)
        <div class="text-sm text-white mb-2" x-data="{ isCollapsed: false }">
            <span  x-text="isCollapsed ? '{{$job->description}}': '{{Str::limit($job->description,200)}}'"></span>
            <span  x-text="isCollapsed ? ' Sakrij tekst' : ' Prikaži ceo tekst'" x-on:click="isCollapsed = !isCollapsed" class="font-bold hover:cursor-pointer"></span>
        </div>
        @else
        <div class="text-sm text-white mb-2">
            <span>{{$job->description}}</span>
        </div>
        @endif
        {{-- Job description start --}}

        <hr class="border-neutral-600 my-2">


        {{-- Job footer start --}}
        <div class="flex text-sm text-white items-center  justify-between">

            <div class="flex items-center ">

                {{-- Hamburger button --}}
                <div @click="expanded_menu = !expanded_menu" class="font-bold btn-gray-xs hover:cursor-pointer mr-3 w-10">
                    <i class="fas fa-bars"></i>
                </div>
                {{-- Hamburger button --}}
                <div class="sm:flex">
                    <div class="text-left">
                        <span class="font-bold">VREDNOST POSLA : </span>
                        <span class="mr-6 font-bold text-yellow-500 text-shadow">{{$job->reward}}€</span>
                    </div>

                    <div class="text-left">
                        <span class="font-bold">OČEKIVANI ROK :</span>
                        <span class="font-bold text-yellow-500 text-shadow">{{$job->days*24}}h</span>
                    </div>
                </div>
            </div>

            {{-- bid counter start --}}
            <div class="grid justify-items-end">
                @if($job->bids->count()==0)
                <a href="{{route('job.bids',$job)}}">
                    <span class="font-bold text-white text-shadow">
                        PONUDE :
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-neutral-700 rounded-full">
                            {{$job->bids->count()}}
                        </span>
                    </span>
                </a>
                @else
                <a href="{{route('job.bids',$job)}}">
                    <span class="font-bold text-white text-shadow">
                        PONUDE :
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{$job->bids->count()}}
                        </span>
                    </span>
                </a>
                @endif
            </div>
            {{-- bid counter end --}}


        </div>
        {{-- Job footer end --}}


        {{-- Alpinejs Buttons start --}}
        <div x-show="expanded_menu" x-collapse x-cloak class="flex justify-between my-2">

            <div>
                {{-- <a class="btn-gray-small" href="{{route('job.index')}}">Nazad</a> --}}
                @if($job->bids->count()>0)
                <a class="btn-amber-small" href="{{route('job.bids',$job)}}">Prikaži ponude</a>
                @endif
                <a class="btn-amber-small" href="{{route('bid.create',$job)}}">Unesi ponudu</a>

            </div>
            <div>
                @if($job->user_id == auth()->user()->id)
                <a class="btn-green-small mr-2" href="{{route('job.edit',$job)}}">Izmeni</a>
                <a class="btn-red-small" href="{{route('job.destroy',$job)}}">Obriši</a>

                @endif
            </div>

        </div>
        {{-- Alpinejs Buttons end --}}

    </div>
    {{-- job card end --}}

</div>
