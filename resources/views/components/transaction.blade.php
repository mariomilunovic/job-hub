    {{-- transaction card start --}}
    <div class="card flex items-center justify-between transition duration-300 bg-lime-500 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3 mb-3">
        <div class="sm:flex items-center">

            <div>
                <span class="font-bold text-neutral-700 text-shadow mr-4">ID#{{$transaction->id}}</span>
            </div>


            <div class="sm:flex-col mb-1">

                <div class="sm:flex justify-start text-sm text-white whitespace-nowrap">
                    <div>
                        {{-- <span class="font-bold">TRANSAKCIJA : </span> --}}
                        {{-- <span class="font-bold text-neutral-700 text-shadow mr-3">ID#{{$transaction->id}}</span> --}}
                    </div>
                    <div>
                        <span class="font-bold">UPLATILAC : </span>
                        <span class="font-bold text-neutral-700 text-shadow mr-3">{{$transaction->from_user->firstname}} {{$transaction->from_user->lastname}}</span>
                    </div>
                    <div>
                        <span class="font-bold">PRIMALAC : </span>
                        <span class="font-bold text-neutral-700 text-shadow mr-3">{{$transaction->to_user->firstname}} {{$transaction->to_user->lastname}}</span>
                    </div>

                </div>


                <div class="sm:flex justify-start text-sm text-white whitespace-nowrap">

                    <div>
                        <span class="font-bold">TIP TRANSAKCIJE : </span>
                        <span class="font-bold text-neutral-700 text-shadow mr-3">{{strtoupper($transaction->transactiontype->name)}} </span>
                    </div>

                    @if($transaction->paymentmethod)
                    <div>
                        <span class="font-bold">METODA PLAĆANJA : </span>
                        <span class="font-bold text-neutral-700 text-shadow">{{$transaction->paymentmethod->name}}</span>
                    </div>
                    @endif

                    @if($transaction->bankaccount)
                    <div>
                        <span class="font-bold">TEKUĆI RAČUN : </span>
                        <span class="font-bold text-neutral-700 text-shadow">{{$transaction->bankaccount->name}}</span>
                    </div>
                    @endif

                    @if($transaction->bid)
                    <div>
                        <span class="font-bold">PONUDA : </span>
                        <span class="font-bold text-neutral-700 text-shadow">{{$transaction->bid->id}}</span>
                    </div>
                    @endif

                </div>

            </div>
        </div>
        <div class="flex-col text-right">
            <div>
                @switch($transaction->transactiontype->name)
                @case('isplata')
                <span class="font-bold text-red-500 text-2xl text-shadow">- {{strtoupper($transaction->amount)}}</span>
                @break
                @case('uplata')
                <span class="font-bold text-green-700 text-2xl text-shadow">+ {{strtoupper($transaction->amount)}}</span>
                @break
                @case('rezervacija')
                <span class="font-bold text-blue-700 text-2xl text-shadow">
                    {{$transaction->to_user_id == auth()->user()->id ? '':'- '.strtoupper($transaction->amount)}}
                </span>
                @break
                @case('plata')
                <span class="font-bold text-2xl text-shadow {{$transaction->to_user_id == auth()->user()->id ? 'text-green-700':'text-red-500'}}">
                    {{$transaction->to_user_id == auth()->user()->id ? '+':'-'}} {{strtoupper($transaction->amount)}}
                </span>

                @break
                @endswitch
            </div>
            <div class="text-neutral-600 font-bold text-xs text-shadow">
                {{$transaction->created_at}}
            </div>
        </div>

    </div>
    {{-- transaction card end --}}
