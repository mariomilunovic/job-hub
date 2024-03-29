<div x-data="{ expanded_menu : false }">
    <div x-data="{ show_user : false }" x-on:keydown.escape.prevent.stop="show_user = false">
        @include('modals.bid_user')
        {{-- bid card start --}}
        <div class="card flex-col transition duration-300 bg-orange-400 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3">

            {{-- bid header start --}}
            <div class="sm:flex justify-between mb-1 items-center">

                <div class="text-sm text-white">

                    <div class="flex items-center">
                        <div class="font-bold mr-2">
                            KANDIDAT :
                        </div>

                        <a class="flex items-center" x-on:click="show_user = !show_user" href="#">

                            <span class="font-bold text-sm mr-2 text-shadow  {{ $bid->user_id == auth()->user()->id ? "text-red-600":"text-neutral-600" }} ">{{$bid->user->firstname}} {{$bid->user->lastname}}</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                            </span>

                        </a>
                    </div>

                    <div>
                        <span class="font-bold">PONUDA :</span>
                        <span class="font-bold text-neutral-600 text-shadow mr-3">ID#{{$bid->id}}</span>
                        <span class="font-bold">POSAO :</span>
                        <span class="font-bold text-neutral-600 text-shadow">ID#{{$bid->job->id}}</span>
                    </div>


                </div>

                <div class="text-sm text-white sm:text-right">
                    <div class="whitespace-nowrap items-center font-bold">

                        @switch($bid->bidstatus->id)
                        @case(1)

                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_blue text-shadow">{{$bid->bidstatus->name}}</span>
                        </div>
                        <span class="font-bold text-neutral-600 text-shadow mt-2">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($bid->created_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$bid->created_at}})</span>
                        </span>
                        @break

                        @case(2)

                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_red text-shadow">{{$bid->bidstatus->name}}</span>
                        </div>
                        <span class="font-bold text-neutral-600 text-shadow mt-2">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($bid->selected_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$bid->selected_at}})</span>
                        </span>
                        @break

                        @case(3)

                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_green text-shadow">{{$bid->bidstatus->name}}</span>
                        </div>
                        <span class="font-bold text-neutral-600 text-shadow mt-2">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($bid->delievered_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$bid->delievered_at}})</span>
                        </span>
                        @break

                        @case(4)

                        <div>
                            <span class="font-bold">STATUS :</span> <span class="bid_status_black text-shadow">{{$bid->bidstatus->name}}</span>
                        </div>
                        <span class="font-bold text-neutral-600 text-shadow mt-2">
                            <span class="font-bold text-white">VREME :</span>
                            <span>{{Carbon\Carbon::parse($bid->accepted_at)->diffForHumans()}}</span>
                            <span class="font-normal text-xs">({{$bid->accepted_at}})</span>
                        </span>
                        @break
                        @endswitch
                    </div>

                </div>
            </div>
            {{-- bid header end --}}

            <hr class="border-neutral-600 my-2">

            {{-- bid message start --}}
            @if(strlen($bid->message)>200)
            <div class="text-sm text-white mb-2" x-data="{ isCollapsed: false }">
                <span  x-text="isCollapsed ? '{{json_encode($bid->message)}}': '{{json_encode(Str::limit($bid->message,200))}}'"></span>
                <span  x-text="isCollapsed ? ' Sakrij tekst' : ' Prikaži ceo tekst'" x-on:click="isCollapsed = !isCollapsed" class="font-bold hover:cursor-pointer"></span>
            </div>
            @else
            <div class="text-sm text-white mb-2">
                <span>{{$bid->message}}</span>
            </div>
            @endif
            {{-- bid message start --}}

            <hr class="border-neutral-600 my-2">


            {{-- bid footer start --}}
            <div class="flex text-sm text-white items-center justify-between">

                <div class="flex items-center ">

                    {{-- Hamburger button --}}
                    @auth
                    <svg @click="expanded_menu = !expanded_menu" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 sm:w-8 sm:h-8 hover:cursor-pointer mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    @endauth
                    {{-- Hamburger button --}}

                    <div class="sm:flex">

                        <div>
                            <span class="font-bold">VREDNOST PONUDE : </span>
                            <span class="mr-6 font-bold text-neutral-600 text-shadow">{{$bid->offer}}€</span>
                        </div>

                        <div>
                            <span class="font-bold">PONUĐENI ROK :</span>
                            <span class="font-bold text-neutral-600 text-shadow">
                                @if ($bid->days > 1)
                                {{$bid->days}} dana
                                @else
                                {{$bid->days}} dan
                                @endif
                            </span>
                        </div>

                    </div>

                </div>

            </div>
            {{-- bid footer end --}}


            {{-- Alpinejs Buttons start --}}
            <div x-show="expanded_menu" x-collapse x-cloak class="flex justify-between">

                <div>

                    @if($bid->user_id != auth()->user()->id) {{-- korisnik ne može da izabere svoju ponudu --}}
                    @if($bid->bidstatus->id == 1) {{-- može da izabere samo ponudu koja ima status 'kreirana' --}}
                    @if($bid->job->status_id == 1) {{-- posao mora da ima status 'prikuplja ponude' --}}
                    <a class="btn-blue-xs" href="{{route('bid.select',$bid)}}">Izaberi</a>
                    @endif
                    @endif
                    @endif

                    @if($bid->user_id == auth()->user()->id) {{-- korisnik može da isporuči samo svoju ponudu --}}
                    @if($bid->bidstatus->id == 2) {{-- može da isporuči samo ponudu koja ima status 'izabrana' --}}
                    @if($bid->job->status_id == 2) {{-- posao mora da ima status 'čeka radove' --}}
                    <a class="btn-purple-xs" href="{{route('bid.deliver',$bid)}}">Isporuči</a>
                    @endif
                    @endif
                    @endif

                    @if($bid->bidstatus->id == 3) {{-- može da prihvati radove  samo za ponudu koja ima status 'radovi isporučeni' --}}
                    @if($bid->job->status_id == 3) {{-- posao mora da ima status 'Radovi isporučeni' --}}
                    <a class="btn-gray-xs" href="{{route('bid.accept',$bid)}}">Prihvati radove</a>
                    @endif
                    @endif
                </div>
                <div>
                    @if($bid->user_id == auth()->user()->id && $bid->bidstatus_id == 1)
                    <a class="btn-green-small mr-2" href="{{route('bid.edit',$bid)}}">Izmeni</a>
                    <a class="btn-red-small" href="{{route('bid.destroy',$bid)}}">Obriši</a>

                    @endif
                </div>

            </div>
            {{-- Alpinejs Buttons end --}}

        </div>
        {{-- bid card end --}}

    </div>
</div>
