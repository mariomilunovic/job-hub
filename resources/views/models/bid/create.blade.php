@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 ">

    <x-title title="Unos ponude za izabrani posao"/>

    <form action="{{route('bid.store')}}" method="post" class="w-full">

        @csrf
        <!-- Job Card -->
        <x-job :job="$job"/>


        <!-- Bid Card -->
        <div class="card bg-yellow-500 flex-col p-3">


            <label for="message" class="text-sm font-bold text-neutral-600">Poruka</label>
            <textarea type="text" name="message" placeholder="Detaljno opišite vašu ponudu" rows="7" cols="80" class="text-sm input">{{old('description')}}</textarea>
            <div class="text-sm font-bold text-red-500">@error ('message'){{ $message }}@enderror</div>

            <div class="flex justify-between">
                <div>
                    <label for="offer" class="block text-sm font-bold text-neutral-600">Ponuđena vrednost</label>
                    <input type="number" id="offer" name="offer" placeholder="Unesi vrednost" value="{{old('reward')}}" class="input">
                    <div class="text-sm font-bold text-red-500">@error ('offer'){{ $message }}@enderror</div>
                </div>
                <div class="my-2"></div>
                <div>
                    <label for="days" class="block text-sm font-bold text-neutral-600">Ponuđeni rok</label>
                    <input type="number" id="days" name="days" placeholder="Unesi broj dana" value="{{old('days')}}" class="input">
                    <div class="text-sm font-bold text-red-500">@error ('days'){{ $message }}@enderror</div>
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
