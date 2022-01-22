@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 p-3">

    @if ($userJobs->count()==0)
    <x-title title="Nemate objavljenih poslova"/>
    <a href="{{route('job.create')}}" class="btn-blue-medium mt-3">Objavi posao</a>

    @else
    <x-title title="Lista mojih poslova"/>

        @foreach ($userJobs as $job)
        <x-job :job="$job"/>
        @endforeach


    @endif


    {{$userJobs->links()}}

</div>



@endsection
