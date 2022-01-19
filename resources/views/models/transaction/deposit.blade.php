@extends('layouts.app')

@section('content')

<div class="flex-col">

    <form action="{{route('deposit.store')}}" method="post" autocomplete="off">

        @csrf

        <x-title title="Uplata"/>

        <div>
            <span class="mt-4 font-bold text-neutral-500">Trenutno stanje</span>
            <div class="font-bold text-white text-3xl ">
                {{auth()->user()->balance}} €
            </div>
        </div>

        <label for="amount" class="mt-4 font-bold text-neutral-500">Iznos za uplatu</label>
        <input type="number" id="amount" name="amount" placeholder="Unesite iznos" value="{{old('ammount')}}" class="w-full p-1 input">
        <div class="error">@error ('amount'){{ $message }}@enderror</div>

        <label for="payment_method_id" class="mt-4 font-bold text-neutral-500">Način plaćanja</label>
        <select id="payment_method_id" name="payment_method_id" class="w-full p-1 input">
            <option value="">Izaberite način plaćanja</option>
            @foreach($payment_methods as $payment_method )
            <option value="{{$payment_method->id}}" {{(old("payment_method_id") == $payment_method->id ? "selected":"")}}>{{$payment_method->name}} / {{$payment_method->card_number}}</option>
            @endforeach
        </select>
        <div class="error">@error('payment_method_id'){{ $message }}@enderror</div>

        {{-- <input type="hidden" id="job_id" name="job_id" value="{{$job->id}}"> --}}

        <button type="submit" class="w-full mt-2 btn-yellow-medium">
            Potvrdi uplatu
        </button>

    </form>
</div>


@endsection
