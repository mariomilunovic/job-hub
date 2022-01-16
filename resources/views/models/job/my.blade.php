@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz mojih poslova"/>

    @if ($myJobs->count()>0)

        @foreach ($myJobs as $job)
        <x-job :job="$job"/>
        @endforeach

    @else
        <div>Nemate objavljenih poslova</div>
    @endif


    {{$myJobs->links()}}

</div>



@endsection
