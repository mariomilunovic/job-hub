<div x-data="{ expanded_menu : false }">

    {{-- bid card start --}}
    <div class="card flex-col transition duration-300 bg-orange-400 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3">

        {{-- bid header start --}}
        <div class="sm:flex justify-between mb-1 items-center">

            <div class="text-sm text-white">
                <div>
                    <span class="font-bold">PONUDA :</span>
                    <span class="font-bold text-neutral-600 text-shadow mr-3">ID#{{$bid->id}}</span>
                    <span class="font-bold">POSAO :</span>
                    <span class="font-bold text-neutral-600 text-shadow">ID#{{$bid->job->id}}</span>
                </div>
                <div>
                    <span class="font-bold">KANDIDAT :</span>
                    <span class="font-bold text-shadow {{ $bid->user_id == auth()->user()->id ? " text-red-500":"text-neutral-600 " }}">{{$bid->user->firstname}} {{$bid->user->lastname}}</span>

                </div>

            </div>

            <div class="text-sm text-white sm:text-right">
                <div class="whitespace-nowrap font-bold">

                    @switch($bid->bidstatus->id)
                    @case(1)

                    <div>
                        <span class="font-bold">STATUS :</span> <span class="bid_status_blue text-shadow">{{$bid->bidstatus->name}}</span>
                    </div>
                    <span class="font-bold text-neutral-600 text-shadow mt-2">
                        {{Carbon\Carbon::parse($bid->created_at)->diffForHumans()}} ({{$bid->created_at}})
                    </span>
                    @break

                    @case(2)

                    <div>
                        <span class="font-bold">STATUS :</span> <span class="bid_status_red text-shadow">{{$bid->bidstatus->name}}</span>
                    </div>
                    <span class="font-bold text-neutral-600 text-shadow mt-2">
                        {{Carbon\Carbon::parse($bid->selected_at)->diffForHumans()}} ({{$bid->selected_at}})
                    </span>
                    @break

                    @case(3)

                    <div>
                        <span class="font-bold">STATUS :</span> <span class="bid_status_green text-shadow">{{$bid->bidstatus->name}}</span>
                    </div>
                    <span class="font-bold text-neutral-600 text-shadow mt-2">
                        {{Carbon\Carbon::parse($bid->delievered_at)->diffForHumans()}} ({{$bid->delievered_at}})
                    </span>
                    @break

                    @case(4)

                    <div>
                        <span class="font-bold">STATUS :</span> <span class="bid_status_black text-shadow">{{$bid->bidstatus->name}}</span>
                    </div>
                    <span class="font-bold text-neutral-600 text-shadow mt-2">
                        {{Carbon\Carbon::parse($bid->accepted_at)->diffForHumans()}} ({{$bid->accepted_at}})
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
                <div @click="expanded_menu = !expanded_menu" class="font-bold btn-orange-xs hover:cursor-pointer mr-3">
                    <i class="fas fa-bars"></i>
                </div>
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
        <div x-show="expanded_menu" x-collapse x-cloak class="flex justify-between my-2">

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
