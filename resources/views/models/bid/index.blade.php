@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz svih ponuda"/>
    @foreach ($bids as $bid)
    <x-bid :bid="$bid"/>
    @endforeach

    {{$bids->links()}}

</div>


@endsection
