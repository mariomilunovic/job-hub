@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 w-96 sm:w-800">

    <x-title title="Izmena ponude za izabrani posao"/>

    <form action="{{route('bid.update',$bid)}}" method="post" class="">

        @method('put')
        @csrf

        <!-- Job component -->
        <x-job :job="$bid->job->first()"/>


        <!-- Bid input -->
        <div class="card gradient_amber flex-col p-3">


            <label for="message" class="label">Poruka</label>
            <textarea type="text" name="message" placeholder="Detaljno opišite vašu ponudu" rows="7" cols="80" class="input">{{$bid->message}}</textarea>
            <div class="error">@error ('message'){{ $message }}@enderror</div>

            <div class="sm:flex justify-between">
                <div>
                    <label for="offer" class="label">Ponuđena vrednost</label>
                    <input type="number" id="offer" name="offer" placeholder="Unesi vrednost" value="{{$bid->offer}}" class="w-full input">
                    <div class="error">@error ('offer'){{ $message }}@enderror</div>
                </div>

                <div>
                    <label for="days" class="label">Ponuđeni rok</label>
                    <input type="number" id="days" name="days" placeholder="Unesi broj dana" value="{{$bid->days}}" class="w-full input">
                    <div class="error">@error ('days'){{ $message }}@enderror</div>
                </div>
            </div>

            <input type="hidden" id="job_id" name="job_id" value="{{$job->id}}">

            <!-- End of Job Card -->
            <div class="flex-col">
                <button type="submit" class="block w-full btn-blue-medium mt-3">
                    Potvrdi izmene
                </button>
                <a href="{{route('bid.sent',auth()->user())}}" class="block w-full btn-red-medium mt-3">Odustani</a>
            </div>
            <!-- End of Buttons -->

        </div>

    </form>

</div>

@endsection
