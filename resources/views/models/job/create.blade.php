@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 ">

    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-500">Objava novog posla</h2>
    <hr class="mb-3 border-2 border-gray-500 rounded">

    <form action="{{route('job.store')}}" method="post" class="w-full">

        @csrf

        <!-- Job Card -->
        <div class="card bg-blue-600 flex-col p-2 mb-3">

            <label for="skill_id" class="text-sm mx-4 mt-3 font-bold text-white">Izaberi kategoriju</label>
            <select id="skill_id" name="skill_id" class="mx-4 px-1 py-1 leading-tight text-gray-600 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
                <option value="">Izaberite potrebnu veštinu</option>
                @foreach($allCategories as $category )
                @foreach($category->skills as $skill )

                <option value="{{$skill->id}}" {{ (old("skill_id") == $skill->id ? "selected":"") }}>{{$category->name}}/{{$skill->name}}</option>

                @endforeach
                @endforeach
            </select>
            <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('skill_id'){{ $message }}@enderror</div>


            <label for="description" class="text-sm mx-4 font-bold text-white">Opis</label>
            <textarea type="text" name="description" class="mx-4 px-1 py-1 text-sm leading-tight text-gray-600 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500" rows="7" cols="80">{{old('description')}}</textarea>
            <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('description'){{ $message }}@enderror</div>

            <div class="flex">
                <div class="justify-items-end">
                    <label for="reward" class="text-sm ml-4 font-bold text-white">Vrednost</label>
                    <input type="number" id="reward" name="reward" placeholder="Unesi vrednost" value="{{old('reward')}}" class="ml-2 px-1 py-1 mt-2 leading-tight text-gray-600 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
                    <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('reward'){{ $message }}@enderror</div>
                </div>
                <div class="justify-items-end">
                    <label for="days" class="text-sm ml-4 w-1/3 font-bold text-white">Rok</label>
                    <input type="number" id="days" name="days" placeholder="Unesi broj dana" value="{{old('days')}}" class="ml-2 mr-4 px-1 py-1 mt-2 leading-tight text-gray-600 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
                    <div class="ml-2 mb-3 px-1 text-sm font-bold text-red-400">@error ('days'){{ $message }}@enderror</div>
                </div>
            </div>

        </div>

        <!-- End of Job Card -->
        <div class="flex-col">
            <button type="submit" class="block w-full btn-blue-medium mt-3">
                Unesi
            </button>
            <a href="{{route('job.index')}}" class="block w-full mt-3 btn-red-medium">Odustani</a>
        </div>
        <!-- End of Buttons -->

    </form>


</div>


@endsection
