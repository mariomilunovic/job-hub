@extends('layouts.app')

@section('content')

<div class="flex-col">

    <x-title title="Prikaz svih ponuda za izabrani posao"/>


    <x-job :job="$job"/>


    @foreach ($bids as $bid)
    <x-bid :bid="$bid"/>
    @endforeach

    <div class="flex-col">
        <a href="{{route('bid.create',$job)}}"><div class="block w-full btn-green-medium text-shadow mt-5 mb-5"> Postavi svoju ponudu </div></a>
    </div>

    {{$bids->links()}}
</div>


@endsection
