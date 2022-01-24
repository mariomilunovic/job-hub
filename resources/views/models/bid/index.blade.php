@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3">

    <x-title title="Prikaz svih ponuda"/>
    @foreach ($bids as $bid)
    <div class="mb-3">
        <x-bid :bid="$bid"/>
    </div>
    @endforeach

    {{$bids->links()}}

</div>


@endsection
