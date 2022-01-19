@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz svih transakcija"/>

    @foreach ($myTransactions as $transaction)
    <x-transaction :transaction="$transaction"/>
    @endforeach

    {{$myTransactions->links()}}

</div>


@endsection
