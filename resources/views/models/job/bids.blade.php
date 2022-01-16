@extends('layouts.app')

@section('content')

<div class="flex-col">

    <x-title title="Prikaz svih ponuda za izabrani posao"/>


    <x-job :job="$job"/>


    <a href="{{route('bid.create',$job)}}" class="block w-full btn-green-medium text-shadow shadow-md my-5">Postavi svoju ponudu</a>

    @foreach ($bids as $bid)
    <x-bid :bid="$bid"/>
    @endforeach

    @if($bids->count()>0)
    <a href="{{route('bid.create',$job)}}" class="block w-full btn-green-medium text-shadow shadow-lg my-5">Postavi svoju ponudu</a>
    @endif
    
    {{$bids->links()}}
</div>


@endsection
