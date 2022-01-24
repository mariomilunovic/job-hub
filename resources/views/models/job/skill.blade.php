@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3">

    <x-title title="Prikaz svih poslova za izabranu veštinu"/>
    @foreach ($jobs as $job)
    <x-job :job="$job"/>
    @endforeach

    {{$jobs->links()}}

</div>


@endsection
