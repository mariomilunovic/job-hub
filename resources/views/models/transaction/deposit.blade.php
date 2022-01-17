@extends('layouts.app')

@section('content')

<div class="flex-col">

    <form action="{{route('transaction.store')}}" method="post" autocomplete="off">

        @csrf

        <x-title title="Uplata"/>


        <label for="ammount" class="mt-4 font-bold text-neutral-500">Iznos</label>
        <input type="number" id="ammount" name="ammount" placeholder="Unesite iznos" value="{{old('ammount')}}" class="w-full p-1 input">
        <div class="mb-3 px-1 text-sm font-bold text-red-500">@error ('ammount'){{ $message }}@enderror</div>

        <label for="paymethod_id" class="mt-4 font-bold text-neutral-500">Način plaćanja</label>
        <select id="paymethod_id" name="paymethod_id" class="w-full p-1 input">
            <option value="">Izaberite način plaćanja</option>
            {{-- @foreach($paymethods as $paymethod )
            <option value="{{$paymethod->id}}">{{$paymethod->name}}</option>
            @endforeach --}}
        </select>
        <div class="mb-3 text-sm text-red-500">@error('paymethod_id'){{ $message }}@enderror</div>

        <button type="submit" class="w-full mt-2 btn-yellow-medium">
            Potvrdi uplatu
        </button>

    </form>
</div>


@endsection
