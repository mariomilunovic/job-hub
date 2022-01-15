@extends('layouts.app')

@section('content')

<div class="flex-col">

    <!-- Title start -->
    <div>
        <h2 class="text-xl font-bold text-gray-500">Prikaz svih informacija o poslu</h2>
        <hr class="mb-3 border-2 border-gray-500 rounded">
    </div>
    <!-- Title end -->

    <!-- Job Card start -->
    <div class="card flex-col transition duration-500 bg-blue-500 hover:bg-blue-400 ease-in-out hover:cursor-pointer p-2 mb-3 {{ $job->user_id == auth()->user()->id ? "border-4 border-red-500":"" }}">

        <div id="header" class="flex justify-between mb-1">
            <div class="text-sm">
                <span class="font-bold">VEŠTINA :</span>
                <span>{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
            </div>
            <div class="text-sm">
                <span class="font-bold">POSLODAVAC :</span>
                <span class="{{ $job->user_id == auth()->user()->id ? "font-bold text-red-400":"" }}">{{$job->user->firstname}} {{$job->user->lastname}}</span>
            </div>

        </div>

        <hr class="mb-1 border-blue-900 rounded border-1">

        <div id="description" class="flex-col">
            <div class="text-sm">
                <span class="font-bold">OPIS :</span>
                <span>{{$job->description}}</span>
            </div>

        </div>

        <hr class="my-1 border-blue-900 rounded border-1">

        <div id="footer" class="flex justify-between mb-1">
            <div class="text-sm"><span class="font-bold">VREDNOST POSLA :</span>  {{$job->reward}}€</div>
            <div class="text-sm"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
            <div class="text-sm"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
        </div>
    </div>
    <!-- Job Card end -->

    <!-- Buttons start-->
    <div class="flex justify-between">
        <div>
            <a class="btn-gray-small" href="{{route('job.index')}}">Nazad</a>
            @if($job->user_id == auth()->user()->id)
            <a class="btn-green-small" href="{{route('job.edit',$job)}}">Izmeni</a>
            <a class="btn-red-small" href="{{route('job.destroy',$job)}}">Obriši</a>
            @endif
        </div>
        <div>
            @if ($job->bids->count()>0)
            <a href="{{route('job.bids',$job)}}">
                <span class="m-1 btn-yellow-small text-shadow ">
                    Ponude :
                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                        {{$job->bids->count()}}
                    </span>
                </span>
            </a>

            @else
            <a href="{{route('job.bids',$job)}}">
                <span class="m-1 btn-gray-small text-shadow ">
                    Ponude :
                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                        {{$job->bids->count()}}
                    </span>
                </span>
            </a>
            @endif
        </div>
    </div>
    <!-- Buttons end -->


</div>

@endsection
