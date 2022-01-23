@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3">

    <x-title title="Izmena podataka o poslu"/>

    <form action="{{route('job.update',$job)}}" method="post" class="w-full">

        @method('put')
        @csrf

        <!-- Job input start -->
        <div class="card bg-neutral-400 flex-col p-3 mb-3 ">
            <div class="flex-col">
                <div>
                    <label for="skill_id" class="label">Izaberite veštinu potrebnu za posao</label>
                    <select id="skill_id" name="skill_id" class="w-full input">

                        @foreach($allCategories as $category )
                        @foreach($category->skills as $skill )

                        <option value="{{$skill->id}}" {{$skill->id == $job->skills()->first()->id ?'selected':''}}>{{$category->name}}/{{$skill->name}}</option>

                        @endforeach
                        @endforeach
                    </select>
                    <div class="error">@error ('skill_id'){{ $message }}@enderror</div>
                </div>

                <label for="description" class="label">Unesite opis posla</label>
                <textarea type="text" name="description" placeholder="Detaljno opišite šta očekujete da bude urađeno" class="w-full input" rows="7" cols="80">{{$job->description}}</textarea>
                <div class="error">@error ('description'){{ $message }}@enderror</div>

                <div class="flex justify-between">
                    <div class="">
                        <label for="reward" class="label">Vrednost posla</label>
                        <input type="number" id="reward" name="reward" placeholder="Unesi vrednost" value="{{$job->reward}}" class="w-full input">
                        <div class="error">@error ('reward'){{ $message }}@enderror</div>
                    </div>
                    <div class="ml-4">
                        <label for="days" class="label">Očekivano vreme</label>
                        <input type="number" id="days" name="days" placeholder="Unesi broj dana" value="{{$job->days}}" class="w-full input">
                        <div class="error">@error ('days'){{ $message }}@enderror</div>
                    </div>
                </div>


                <!-- Buttons start -->
                <div class="flex-col">
                    <button type="submit" class="block w-full btn-blue-medium mt-3">
                        Unesi
                    </button>
                    <a href="{{route('job.index')}}" class="block w-full btn-red-medium mt-3 ">Odustani</a>
                </div>
                <!-- Buttons end -->

                <!-- Job input end -->
            </div>
        </div>
    </form>

</div>


@endsection
