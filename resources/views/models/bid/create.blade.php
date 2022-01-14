@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 ">

    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-500">Nova ponuda za posao</h2>
    <hr class="mb-3 border-2 border-gray-500 rounded">

    <form action="{{route('bid.store')}}" method="post" class="w-full">

        @csrf
        <!-- Job Card -->
        <div class="card flex-col transition duration-500 bg-blue-500 hover:bg-blue-600 ease-in-out hover:cursor-pointer p-2 mb-3 {{ $job->user_id == auth()->user()->id ? "border-4 border-red-500":"" }}">

            <div id="header" class="flex justify-between mb-1">
                <div class="text-sm">
                    <span class="font-bold text-white">VEŠTINA :</span>
                    <span class="text-white">{{$job->skills->first()->category->name}} / {{$job->skills->first()->name}}</span>
                </div>
                <div class="text-sm">
                    <span class="font-bold text-white">POSLODAVAC :</span>
                    <span class="text-white">{{$job->user->firstname}} {{$job->user->lastname}}</span>
                </div>

            </div>

            <hr class="mb-1 border-blue-900 rounded border-1">

            <div id="description" class="flex-col">
                <div class="text-sm">
                    <span class="font-bold text-white">OPIS :</span>
                    <span class="text-white">{{$job->description}}</span>
                </div>

            </div>

            <hr class="my-1 border-blue-900 rounded border-1">

            <div id="footer" class="flex justify-between mb-1">
                <div class="text-sm text-white"><span class="font-bold">VREDNOST POSLA :</span>  {{$job->reward}}</div>
                <div class="text-sm text-white"><span class="font-bold">STATUS POSLA :</span>  {{$job->status->name}}</div>
                <div class="text-sm text-white"><span class="font-bold">KREIRAN :</span>  {{$job->created_at}}</div>
            </div>

            {{-- <div class="justify-items-end">
                <a href="{{route('job.show',$job)}}"><span class="btn-purple-small text-shadow">Detalji </span></a>
            </div> --}}

        </div>


        <!-- Bid Card -->
        <div class="card bg-yellow-500 flex-col p-2 mb-3">

            <label for="message" class="text-sm mx-4 font-bold text-gray-500">Poruka</label>
            <textarea type="text" name="message" class="mx-4 px-1 py-1 text-sm leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500" rows="7" cols="80">{{old('description')}}</textarea>
            <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('message'){{ $message }}@enderror</div>

            <div class="flex justify-between">
                <div>
                    <label for="offer" class="text-sm ml-4 font-bold text-gray-500">Ponuda</label>
                    <input type="number" id="offer" name="offer" placeholder="Unesi vrednost" value="{{old('reward')}}" class="ml-2 px-1 py-1 mt-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
                    <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('offer'){{ $message }}@enderror</div>
                </div>
                <div>
                    <label for="days" class="text-sm ml-4 w-1/3 font-bold text-gray-500">Rok</label>
                    <input type="number" id="days" name="days" placeholder="Unesi broj dana" value="{{old('days')}}" class="ml-2 mr-4 px-1 py-1 mt-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
                    <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('days'){{ $message }}@enderror</div>
                </div>
            </div>

            <input type="hidden" id="job_id" name="job_id" value="{{$job->id}}">
        </div>

        <!-- End of Job Card -->
        <div class="flex-col">
            <button type="submit" class="block w-full btn-blue-medium mt-3">
                Unesi
            </button>
            <a href="{{route('job.bids',$job)}}" class="block w-full mt-3 btn-red-medium">Odustani</a>
        </div>
        <!-- End of Buttons -->

    </form>


</div>


@endsection
