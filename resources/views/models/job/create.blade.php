@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3 ">

    <x-title title="Objava novog posla"/>

    <form action="{{route('job.store')}}" method="post" class="">

        @csrf

        <!-- Job input start -->
        <div class="card bg-neutral-400 flex-col p-3 mb-3">
            <div class="flex-col">
                <div>
                    <label for="skill_id" class="block text-sm font-bold text-neutral-600">Izaberite veštinu potrebnu za posao</label>
                    <select id="skill_id" name="skill_id" class="w-full p-1 input">
                        <option value="">Izaberite potrebnu veštinu</option>
                        @foreach($allCategories as $category )
                        @foreach($category->skills as $skill )

                        <option value="{{$skill->id}}" {{ (old("skill_id") == $skill->id ? "selected":"") }}>{{$category->name}}/{{$skill->name}}</option>

                        @endforeach
                        @endforeach
                    </select>
                    <div class="mb-3 px-1 text-sm font-bold text-red-500">@error ('skill_id'){{ $message }}@enderror</div>
                </div>

                <label for="description" class="block w-full text-sm font-bold text-neutral-600">Unesite opis posla</label>
                <textarea type="text" name="description" placeholder="Detaljno opišite šta očekujete da bude urađeno" class="w-full p-1 text-sm input" rows="7" cols="80">{{old('description')}}</textarea>
                <div class="mb-3 px-1 text-sm font-bold text-red-500">@error ('description'){{ $message }}@enderror</div>

                <div class="flex justify-between">
                    <div class="">
                        <label for="reward" class="w-full text-sm font-bold text-neutral-600">Vrednost posla</label>
                        <input type="number" id="reward" name="reward" placeholder="Unesi vrednost" value="{{old('reward')}}" class="w-full  p-1 input">
                        <div class="mb-3 px-1 text-sm font-bold text-red-500">@error ('reward'){{ $message }}@enderror</div>
                    </div>
                    <div class="ml-4">
                        <label for="days" class="w-full text-sm font-bold text-neutral-600">Očekivano vreme</label>
                        <input type="number" id="days" name="days" placeholder="Unesi broj dana" value="{{old('days')}}" class="w-full p-1 input">
                        <div class="mb-3 px-1 text-sm font-bold text-red-500">@error ('days'){{ $message }}@enderror</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job input end -->

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
