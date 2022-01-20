@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz mojih poslova"/>

    @if ($userJobs->count()>0)

        @foreach ($userJobs as $job)
        <x-job :job="$job"/>
        @endforeach

    @else
        <div>Nemate objavljenih poslova</div>
    @endif


    {{$userJobs->links()}}

</div>



@endsection
