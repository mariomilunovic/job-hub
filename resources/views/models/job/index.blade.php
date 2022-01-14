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
        <div x-data="{ expanded_menu : false }">
            <div @click="expanded_menu = !expanded_menu" class="card flex-col transition duration-500 bg-blue-500 hover:bg-blue-400 ase-in-out hover:cursor-pointer p-2 mb-3 {{ $job->user_id == auth()->user()->id ? "border-4 border-red-500":"" }}">


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

                <div id="description" class="flex justify-between">
                    <div class="text-sm">
                        <span class="font-bold">OPIS :</span>
                        <span>{{Str::limit($job->description,200)}}</span>
                    </div>
                </div>

                <hr class="my-1 border-blue-900 rounded border-1">

                <div id="footer" class="flex justify-between mb-1">
                    <div class="text-sm"><span class="font-bold">VREDNOST POSLA :</span>  {{$job->reward}}€</div>
                    <div class="text-sm"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
                    <div class="text-sm"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
                </div>


                {{-- alpine js menu start --}}
                <div x-show="expanded_menu" x-collapse x-cloak>

                    <hr class="my-1 border-blue-900 rounded border-1">

                    <div class="flex justify-between">
                        <div>

                            <a class="btn-gray-small" href="{{route('job.show',$job)}}">Prikaži</a>
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

                </div>
                {{-- alpine js menu end --}}

            </div>


        </div>


        @endforeach

        {{$allJobs->links()}}

    </div>
</div>

@endsection
