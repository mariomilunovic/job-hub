@extends('layouts.app')

@section('content')

<div class="flex-col">

    <form action="{{route('transaction.store')}}" method="post" autocomplete="off">

        @csrf

        <x-title title="Isplata"/>


        <label for="ammount" class="mt-4 font-bold text-neutral-500">Iznos</label>
        <input type="number" id="ammount" name="ammount" placeholder="Unesite iznos" min="10" max="{{auth()->user()->balance}}" value="{{old('ammount')}}" class="w-full p-1 input">
        <div class="mb-3 px-1 font-bold text-red-500">@error ('ammount'){{ $message }}@enderror</div>

        <label for="bankaccount_id" class="mt-4 font-bold text-neutral-500">Račun</label>
        <select id="bankaccount_id" name="bankaccount_id" class="w-full p-1 input">
            <option value="">Izaberite račun</option>
            {{-- @foreach($bankaccounts as $bankaccount )
            <option value="{{$bankaccount->id}}">{{$bankaccount->name}}</option>
            @endforeach --}}
        </select>
        <div class="mb-3 text-red-500">@error('bankaccount_id'){{ $message }}@enderror</div>

        <button type="submit" class="w-full mt-2 btn-yellow-medium">
            Potvrdi uplatu
        </button>

    </form>
</div>


@endsection
