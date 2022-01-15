@extends('layouts.app')

@section('content')

<div class="p-3">
    <!-- Title start -->
    <h2 class="text-xl font-bold text-gray-500">Prikaz podataka o ponudi</h2>
    <hr class="mb-3 border-2 border-gray-500 rounded">
    <!-- Title end -->

    <!-- Job Card start -->
    <div class="card flex-col transition duration-500 bg-blue-500 hover:bg-blue-400 ease-in-out hover:cursor-pointer p-2 mb-2 {{ $job->user_id == auth()->user()->id ? "border-4 border-red-500":"" }}">

        <div id="header" class="flex justify-between mb-1">
            <div class="text-sm">
                <span class="font-bold">POSLODAVAC :</span>
                <span>{{$job->user->firstname}} {{$job->user->lastname}}</span>
            </div>
            <div class="text-sm">
                <span class="font-bold">VEŠTINA :</span>
                <span>{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
            </div>
            <div class="text-sm">
                <span class="font-bold">POSAO ID :</span>
                <span>{{$job->id}}</span>
            </div>
        </div>

        <hr class="mb-1 border-gray-500 rounded border-1">

        <div id="description" class="flex-col">
            <div class="text-sm">
                <span class="font-bold">OPIS :</span>
                <span>{{$job->description}}</span>
            </div>

        </div>

        <hr class="my-1 border-gray-500 rounded border-1">

        <div id="footer" class="flex justify-between mb-1">
            <div class="text-sm"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
            <div class="text-sm"><span class="font-bold">VREDNOST POSLA :</span>  {{$job->reward}}€</div>
            <div class="text-sm"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
        </div>
    </div>
    <!-- Job Card end -->


    <!-- Bid Card start -->
    <div class="flex-col p-2 mb-3 bg-yellow-400 hover:bg-yellow-500 transition duration-500 card {{ $bid->user_id == auth()->user()->id ? "border-4 border-red-500":""}}">


        <div id="header" class="flex justify-between mb-1 xl:flex">
            <div class="text-sm"><span class="{{ $bid->user_id == auth()->user()->id ? "font-bold text-red-400":"" }}">PONUĐAČ: {{$bid->user->firstname}} {{$bid->user->lastname}}</span></div>
            <div class="text-sm"><span class="font-bold">PONUDA ID: {{$bid->id}}</span></div>

        </div>

        <hr class="mb-1 border-gray-500 rounded border-1">

        <div id="description" class="flex-col">
            <div>{{$bid->message}}</div>
        </div>

        <hr class="my-1 border-gray-500 rounded border-1">

        <div id="footer" class="flex items-end justify-between mb-1">
            <div class="flex-col">
                <div class="text-sm">
                    <span class="font-bold">STATUS:</span>
                    <span>{{$bid->bidstatus->name}}</span>
                </div>
                <div class="text-sm">
                    <span class="font-bold">VREDNOST:</span>
                    <span>{{$bid->offer}}</span>
                    <span class="font-bold"> / ROK:</span>
                    <span>{{$bid->days}}</span> </div>
                    <div class="text-sm"><span class="font-bold">KREIRANA:</span> {{$bid->created_at}} </div>
                </div>
            </div>
        </div>

        <!-- Buttons start-->
        <div class="flex justify-between">
            <div>
                <a class="btn-gray-small" href="{{route('job.index')}}">Nazad</a>
                @if($bid->user_id == auth()->user()->id)
                <a class="btn-green-small" href="{{route('bid.edit',$bid)}}">Izmeni</a>
                <a class="btn-red-small" href="{{route('bid.destroy',$bid)}}">Obriši</a>
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
    <!-- Bid Card end  -->




    @endsection
