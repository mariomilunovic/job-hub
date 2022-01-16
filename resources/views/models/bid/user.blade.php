@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz mojih ponuda"/>
    
    @foreach ($bids as $bid)
    <x-job :job="$bid->job"/>
    <x-bid :bid="$bid"/>
    <hr class="border-neutral-600 my-3 border-2 rounded">
    @endforeach

    {{$bids->links()}}

</div>


@endsection
