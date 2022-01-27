@extends('layouts.app')

@section('content')


<div class="flex-col pb-3 mb-3 w-full sm:w-800">

    <x-title title="Prikaz svih primljenih ponuda"/>

    @foreach ($jobs as $job)

    @if($job->bids->count()>0)
    <div class="card flex-col p-3 mb-3  ">
        <x-job :job="$job"/>

        @foreach($job->bids()->orderBy('created_at','desc')->get() as $bid)
        <div class="mb-3">
            <x-bid :bid="$bid"/>
        </div>
        @endforeach
    </div>
    <hr class="border-neutral-600 my-3 border-2 rounded">

    @endif

    @endforeach

    {{$jobs->links()}}

</div>


@endsection
