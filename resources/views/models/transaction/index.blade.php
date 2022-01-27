@extends('layouts.app')

@section('content')


<div class="flex-col pb-3 mb-3 w-full sm:w-800">

    <x-title title="Prikaz svih transakcija"/>

    @if ($allTransactions->count()>0)
    @foreach ($allTransactions as $transaction)
    <x-transaction :transaction="$transaction"/>
    @endforeach

    {{$allTransactions->links()}}

    @else
    <div>Nemate ni jednu transakciju</div>
    @endif

</div>


@endsection
