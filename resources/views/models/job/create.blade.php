@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 ">

    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-500">Prikaz svih informacija o poslu</h2>
    <hr class="mb-3 border-2 border-gray-500 rounded">

    <div>
        <!-- Job Card -->
        <div class="card bg-cyan-500 flex-col p-2 mb-3">


        </div>
        <!-- End of Job Card -->

        <!-- Buttons -->
        <div class="flex justify-between">
            <div class="flex">
                <a href="{{route('jobs.index'}}"><span class="btn-gray-small text-shadow"> Nazad </span></a>
            </div>
            <div class="flex">
                <a href="{{route('jobs.show',$job)}}"><span class="btn-red-small text-shadow m-1"> Obriši </span></a>
                <a href="{{route('jobs.show',$job)}}"><span class="btn-blue-small text-shadow m-1"> Izmeni </span></a>
                <a href="{{route('jobs.show',$job)}}"><span class="btn-yellow-small text-shadow m-1"> Ponude </span></a>
            </div>
        </div>
        <!-- End of Buttons -->

    </div>
</div>


@endsection
