@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3 w-full sm:w-800">

    <x-title title="Prikaz svih ponuda"/>
    @foreach ($bids as $bid)
    <div class="mb-3">
        <x-bid :bid="$bid"/>
    </div>
    @endforeach

    <div class="mb-3">
        {{$bids->links()}}
    </div>

</div>


@endsection
