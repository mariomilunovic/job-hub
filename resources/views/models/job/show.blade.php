@extends('layouts.app')

@section('content')

<div class="flex-col">

    <!-- Title -->
    <div>
        <h2 class="text-xl font-bold text-gray-500">Prikaz svih informacija o poslu</h2>
        <hr class="mb-3 border-2 border-gray-500 rounded">
    </div>

    <!-- Job Card -->
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
                <span>{{$job->description}}</span>
            </div>

        </div>

        <hr class="my-1 border-gray-500 rounded border-1">

        <div id="footer" class="flex justify-between mb-1">
            <div class="text-sm"><span class="font-bold">VREDNOST :</span>  {{$job->reward}}</div>
            <div class="text-sm"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
            <div class="text-sm"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
        </div>

        {{-- <div class="justify-items-end">
            <a href="{{route('job.show',$job)}}"><span class="btn-purple-small text-shadow">Detalji </span></a>
        </div> --}}

    </div>

    <!-- Buttons -->
    <div class="flex justify-between">

        <a href="{{route('job.index')}}"><span class="btn-gray-small text-shadow"> Nazad </span></a>

        <div class="flex">

            <form action="{{route('job.destroy',$job)}}" method="post">

                @method('delete')
                @csrf

                <button type="submit" class="m-1 btn-red-small text-shadow">
                    Obriši
                </button>

                <a href="{{route('job.edit',$job->id)}}"><span class="m-1 btn-blue-small text-shadow"> Izmeni </span></a>

                @if ($job->bids->count()>0)
                <a href="{{route('job.bids',$job->id)}}">
                    <span class="m-1 btn-yellow-small text-shadow ">
                        Ponude :
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{$job->bids->count()}}
                        </span>
                    </span>
                </a>

                @else
                <a href="#">
                    <span class="m-1 btn-gray-small text-shadow ">
                        Ponude :
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{$job->bids->count()}}
                        </span>
                    </span>
                </a>
                @endif

            </form>

        </div>
    </div>
    <!-- End of Buttons -->

    <!-- End of Job Card -->
</div>

@endsection
