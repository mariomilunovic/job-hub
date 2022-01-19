@extends('layouts.app')

@section('content')

<div class="flex-col">

    <form action="{{route('withdraw.store')}}" method="post" autocomplete="off">

        @csrf

        <x-title title="Isplata"/>

        <div>
            <span class="mt-4 font-bold text-neutral-500">Raspoloživa sredstva</span>
            <div class="font-bold text-white text-3xl ">
                {{auth()->user()->balance}} €
            </div>
        </div>

        <label for="amount" class="mt-4 font-bold text-neutral-500">Iznos</label>
        <input type="number" id="amount" name="amount" placeholder="Unesite iznos" max={{auth()->user()->balance}} value="{{old('amount')}}" class="w-full p-1 input">
        <div class="error">@error ('amount'){{ $message }}@enderror</div>

        <label for="bank_account_id" class="mt-4 font-bold text-neutral-500">Način plaćanja</label>
        <select id="bank_account_id" name="bank_account_id" class="w-full p-1 input">
            <option value="">Izaberite način plaćanja</option>
            @foreach($bank_accounts as $bank_account )
            <option value="{{$bank_account->id}}"  {{(old("bank_account_id") == $bank_account->id ? "selected":"")}} >{{$bank_account->name}} / {{$bank_account->account_number}}</option>
            @endforeach
        </select>
        <div class="error">@error('bank_account_id'){{ $message }}@enderror</div>

        {{-- <input type="hidden" id="job_id" name="job_id" value="{{$job->id}}"> --}}

        <button type="submit" class="w-full mt-2 btn-yellow-medium">
            Potvrdi isplatu
        </button>

    </form>
</div>


@endsection
