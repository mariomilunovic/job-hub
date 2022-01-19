@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz svih transakcija"/>

    @if ($myTransactions->count()>0)

    @foreach ($myTransactions as $transaction)
    <x-transaction :transaction="$transaction"/>
    @endforeach

    {{$myTransactions->links()}}

    @else
    <div>Nemate ni jednu transakciju</div>
    @endif

</div>


@endsection
