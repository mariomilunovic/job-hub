@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 pb-3 w-full sm:w-800">

    <x-title title="Prikaz svih ponuda za izabrani posao"/>


    <x-job :job="$job"/>

    @if($job->user_id != auth()->user()->id && $job->status_id== 1)
    <a href="{{route('bid.create',$job)}}" class="block w-full btn-green-medium text-shadow shadow-md my-5">Postavi svoju ponudu</a>
    @endif

    @foreach ($bids as $bid)
    <div class="mb-3">
        <x-bid :bid="$bid"/>
    </div>
    @endforeach

    @if($job->user_id != auth()->user()->id && $job->status_id== 1)
    @if($bids->count()>0)
    <a href="{{route('bid.create',$job)}}" class="block w-full btn-green-medium text-shadow shadow-lg my-5">Postavi svoju ponudu</a>
    @endif
    @endif

    <div class="mb-3">
        {{$bids->links()}}
    </div>
</div>


@endsection
