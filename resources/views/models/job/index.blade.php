@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3">



    @if ($allJobs->count() == 0)

    <x-title title="Nema objavljenih poslova"/>
    <a href="{{route('job.create')}}" class="btn-blue-medium mt-3">Objavi posao</a>

    @else
    <x-title title="Prikaz svih poslova"/>
    @foreach ($allJobs as $job)
    <x-job :job="$job"/>
    @endforeach
    @endif

    {{$allJobs->links()}}

</div>


@endsection
