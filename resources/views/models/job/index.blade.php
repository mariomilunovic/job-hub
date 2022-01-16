@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz svih objavljenih poslova"/>
    @foreach ($allJobs as $job)
    <x-job :job="$job"/>
    @endforeach

    {{$allJobs->links()}}

</div>


@endsection
