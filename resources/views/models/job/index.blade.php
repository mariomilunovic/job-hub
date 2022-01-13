@extends('layouts.app')

@section('content')

<div class="flex-col">

    <!-- Title -->
    <div>
        <h2 class="text-xl font-bold text-gray-500">Prikaz svih objavljenih poslova</h2>
        <hr class="mb-3 border-2 border-gray-500 rounded">
    </div>


    <!-- Jobs -->
    <div class="flex-col">

        @foreach ($allJobs as $job)
        <!-- Card -->
        <a href="{{route('job.show',$job)}}">
            <div class="card flex-col transition duration-500 ease-in-out hover:cursor-pointer p-2 mb-3 {{ $job->user_id == auth()->user()->id ? "bg-orange-300 hover:bg-orange-400":"bg-blue-300 hover:bg-blue-400" }}">

                <div id="header" class="flex justify-between mb-1">
                    <div class="text-sm">
                        <span class="font-bold">VEŠTINA :</span>
                        <span>{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
                    </div>
                    <div class="text-sm">
                        <span class="font-bold">POSLODAVAC :</span>
                        <span>{{$job->user->firstname}} {{$job->user->lastname}}</span>
                    </div>

                </div>

                <hr class="mb-1 border-gray-500 rounded border-1">

                <div id="description" class="flex-col">
                    <div class="text-sm">
                        <span class="font-bold">OPIS :</span>
                        <span>{{Str::limit($job->description,100)}}</span>
                    </div>

                </div>

                <hr class="my-1 border-gray-500 rounded border-1">

                <div id="footer" class="flex justify-between mb-1">
                    <div class="text-sm"><span class="font-bold">VREDNOST POSLA :</span>  {{$job->reward}}€</div>
                    <div class="text-sm"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
                    <div class="text-sm"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
                </div>

                {{-- <div class="justify-items-end">
                    <a href="{{route('job.show',$job)}}"><span class="btn-purple-small text-shadow">Detalji </span></a>
                </div> --}}

            </div>

        </a>

        @endforeach

        {{$allJobs->links()}}

    </div>
</div>

@endsection
