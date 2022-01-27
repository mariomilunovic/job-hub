@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3 w-full sm:w-800">

    <x-title title="Prikaz svih poslova za izabranu veštinu"/>
    @foreach ($jobs as $job)
    <x-job :job="$job"/>
    @endforeach

    <div class="mb-3">
        {{$jobs->links()}}
    </div>

</div>


@endsection
