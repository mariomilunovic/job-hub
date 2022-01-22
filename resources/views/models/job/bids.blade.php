@extends('layouts.app')

@section('content')

<div class="flex-col">

    <x-title title="Prikaz svih ponuda za izabrani posao"/>


    <x-job :job="$job"/>

    @if($job->user_id != auth()->user()->id && $job->status_id== 1)
    <a href="{{route('bid.create',$job)}}" class="block w-full btn-yellow-medium text-shadow shadow-md my-5">Postavi svoju ponudu</a>
    @endif

    @foreach ($bids as $bid)
    <x-bid :bid="$bid"/>
    @endforeach

    @if($job->user_id != auth()->user()->id && $job->status_id== 1)
    @if($bids->count()>0)
    <a href="{{route('bid.create',$job)}}" class="block w-full btn-yellow-medium text-shadow shadow-lg my-5">Postavi svoju ponudu</a>
    @endif
    @endif

    {{$bids->links()}}
</div>


@endsection
