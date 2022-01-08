@extends('layouts.app')

@section('content')

<div class="p-3">
    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-500">Prikaz svih poslova</h2>
    <hr class="mb-3 border-2 border-gray-500 rounded">

    {{-- <div class="flex"> --}}
        <div class="xl:flex">
            @foreach ($allJobs as $job)

            <div class="card bg-cyan-500 flex-col p-2 h-2/3 m-3">

                <div id="header" class="flex xl:flex-col justify-between mb-1">
                    <div class="text-sm"><span class="font-bold">VEŠTINA:</span> {{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</div>
                    <div class="text-sm"><span class="font-bold">VLASNIK:</span> {{$job->user->firstname}} {{$job->user->lastname}}</div>

                </div>

                <hr class="mb-1 border-1 border-gray-500 rounded">

                <div id="description" class="flex-col">
                    <div>{{$job->description}}</div>
                </div>

                <hr class="my-1 border-1 border-gray-500 rounded">

                <div id="footer" class="flex justify-between items-end mb-1">
                    <div class="flex-col">
                        <div class="text-sm"><span class="font-bold">STATUS:</span>  {{$job->status->name}}</div>
                        <div class="text-sm"><span class="font-bold">VREDNOST:</span>  {{$job->reward}}</div>
                        <div class="text-sm"><span class="font-bold">KREIRAN:</span>  {{$job->created_at}}</div>
                    </div>

                </div>
                <div class="justify-items-end">
                    <a href="{{route('jobs.show',$job)}}"><span class="btn-purple-small text-shadow">Detalji </span></a>
                </div>

            </div>



            @endforeach
        </div>
        {{$allJobs->links()}}
    </div>


    @endsection
