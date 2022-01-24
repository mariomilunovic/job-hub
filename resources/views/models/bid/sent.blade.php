@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3">

    @if($bids->count() == 0)
    <x-title title="Nemate ni jednu poslatu ponudu"/>
    <a href="{{route('job.index')}}" class="btn-blue-medium mt-3">Pogledajte objavljene poslove</a>

    @else

    <x-title title="Prikaz svih poslatih ponuda"/>

    @foreach ($bids as $bid)
    <div class="card flex-col p-3 mb-3  ">
    <x-job :job="$bid->job"/>
    <x-bid :bid="$bid"/>
    </div>
    <hr class="border-neutral-600 my-3 border-2 rounded">
    @endforeach
    @endif

    {{$bids->links()}}

</div>


@endsection
