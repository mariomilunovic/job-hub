@extends('layouts.app')

@section('content')

<div class="flex-col">
    <!-- Title -->
    <div>
        <h2 class="text-xl font-bold text-gray-500">Prikaz svih ponuda</h2>
        <hr class="mb-3 border-2 border-gray-500 rounded">
    </div>


    <!-- Job -->
    <a href="{{route('job.show',$job)}}">
        <div class="card flex-col transition duration-500 ease-in-out hover:cursor-pointer p-2 mb-3 {{ $job->user_id == auth()->user()->id ? "bg-orange-300 hover:bg-orange-400":"bg-blue-300 hover:bg-blue-400" }}">

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
                    <span>{{Str::limit($job->description,100)}}</span>
                </div>

            </div>

            <hr class="my-1 border-gray-500 rounded border-1">

            <div id="footer" class="flex justify-between mb-1">
                <div class="text-sm"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
                <div class="text-sm"><span class="font-bold">VREDNOST POSLA :</span>  {{$job->reward}}€</div>
                <div class="text-sm"><span class="font-bold">ROK :</span>  {{$job->days}}</div>
                <div class="text-sm"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
            </div>

        </div>

    </a>


    <!-- Bids -->
    @foreach ($bids as $bid)
    <a href="{{route('bid.show',$bid)}}">
        <div class="flex-col p-2 mb-3 transition duration-500 card {{ $bid->user_id == auth()->user()->id ? "bg-red-300 hover:bg-red-400":"bg-yellow-500 hover:bg-yellow-600" }}">

            <div id="header" class="flex justify-between mb-1">
                <div class="text-sm"><span class="font-bold">PONUĐAČ: {{$bid->user->firstname}} {{$bid->user->lastname}}</span></div>
                <div class="text-sm"><span class="font-bold">PONUDA ID: {{$bid->id}}</span></div>
            </div>

            <hr class="mb-1 border-gray-500 rounded border-1">

            <div id="description">
                <span class="font-bold">PORUKA :</span>
                <span>{{Str::limit($bid->message,100)}}</span>
            </div>

            <hr class="my-1 border-gray-500 border-1">

            <div id="footer" class="flex-col mb-1">

                <div class="text-sm">
                    <span class="font-bold">STATUS PONUDE :</span>
                    <span>{{$bid->bidstatus->name}}</span>
                </div>
                <div class="text-sm">
                    <span class="font-bold">VREDNOST PONUDE:</span>
                    <span>{{$bid->offer}}</span>
                    <span>€</span>
                    <span class="font-bold"> / ROK:</span>
                    <span>{{$bid->days}}</span>
                    <span> dana</span>
                </div>
                <div class="text-sm">
                    <span class="font-bold">KREIRANA:</span>
                    <span>{{$bid->created_at}}</span>
                </div>
            </div>
        </div>
    </a>
    @endforeach

    {{-- {{$bids->links()}} --}}
</div>


@endsection
