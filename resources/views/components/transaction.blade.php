    {{-- transaction card start --}}
    <div class="card items-center justify-between transition duration-300 bg-lime-500 hover:ring-4 hover:ring-neutral-600 ease-in-out p-3 mb-3">
        <div class="sm:flex items-center mr-3">

            <div>
                <span class="font-bold text-neutral-700 text-shadow mr-4">ID#{{$transaction->id}}</span>
            </div>


            <div class="sm:flex-col mb-1">

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

                <div class="sm:flex justify-start text-sm text-white whitespace-nowrap">

                    <div>
                        <span class="font-bold">UPLATILAC : </span>
                        <span class="font-bold text-neutral-700 text-shadow mr-3">{{$transaction->from_user->firstname}} {{$transaction->from_user->lastname}}</span>
                    </div>
                    <div>
                        <span class="font-bold">PRIMALAC : </span>
                        <span class="font-bold text-neutral-700 text-shadow mr-3">{{$transaction->to_user->firstname}} {{$transaction->to_user->lastname}}</span>
                    </div>

                </div>

            </div>
        </div>
        <div class="flex-wrap content-end text-right">
            <div>
                @switch($transaction->transactiontype->name)

                @case('isplata')
                <div class="font-bold text-red-500 text-2xl whitespace-nowrap text-shadow">
                    - {{strtoupper($transaction->amount)}}
                </div>
                @break

                @case('uplata')
                <div class="font-bold text-green-700 text-2xl whitespace-nowrap text-shadow">
                    + {{strtoupper($transaction->amount)}}
                </div>
                @break

                @case('rezervacija')
                <div class="font-bold text-blue-700 text-2xl whitespace-nowrap text-shadow">
                    {{$transaction->to_user_id == auth()->user()->id ? '':'- '.strtoupper($transaction->amount)}}
                </div>
                @break

                @case('plata')
                <div class="font-bold text-2xl whitespace-nowrap text-shadow {{$transaction->to_user_id == auth()->user()->id ? 'text-green-700':'text-red-500'}}">
                    {{$transaction->to_user_id == auth()->user()->id ? '+':'-'}} {{strtoupper($transaction->amount)}}
                </div>

                @break
                @endswitch
            </div>

            <div class="text-neutral-700 font-bold text-xs text-shadow">
                {{$transaction->created_at}}
            </div>

        </div>

    </div>
    {{-- transaction card end --}}
