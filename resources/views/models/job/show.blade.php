@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 ">

    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-500">Prikaz svih informacija o poslu</h2>
    <hr class="mb-3 border-2 border-gray-500 rounded">

    <div>
        <!-- Job Card -->
        <div class="card bg-cyan-500 flex-col p-2 mb-3">

            <div class="flex justify-between mb-1">
                <div class="text-sm"><span class="font-bold">VLASNIK:</span> {{$job->user->firstname}} {{$job->user->lastname}}</div>
                <div class="text-sm"><span class="font-bold">VEŠTINA:</span> {{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</div>
            </div>

            <hr class="mb-1 border-1 border-gray-500 rounded">

            <div id="description" class="flex-col">
                <div>{{$job->description}}</div>
            </div>

            <hr class="mb-1 border-1 border-gray-500 rounded">

            <div class="flex items-end justify-between mb-1">
                <div class="flex-col">
                    <div class="text-sm"><span class="font-bold">STATUS:</span>  {{$job->status->name}}</div>
                    <div class="text-sm font-bold"><span class="font-bold">VREDNOST:</span>  {{$job->reward}}</div>
                </div>
                <div class="text-sm"><span class="font-bold">KREIRAN:</span>  {{$job->created_at}}</div>

            </div>
        </div>
        <!-- End of Job Card -->

        <!-- Buttons -->
        <div class="flex justify-between">
            <div class="flex">
                <a href="{{route('job.index')}}"><span class="btn-gray-small text-shadow"> Nazad </span></a>
            </div>
            <div class="flex">

                <form action="{{route('job.destroy',$job)}}" method="post">

                    @method('delete')
                    @csrf

                    <button type="submit" class="btn-red-small text-shadow m-1">
                        Obriši
                    </button>
                    <a href="{{route('job.edit',$job)}}"><span class="btn-blue-small text-shadow m-1"> Izmeni </span></a>
                    <a href="{{route('job.bids',$job)}}"><span class="btn-yellow-small text-shadow m-1"> Ponude </span></a>

                </form>

            </div>
        </div>
        <!-- End of Buttons -->

    </div>
</div>


@endsection
