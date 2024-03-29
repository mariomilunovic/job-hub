@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 pb-3 w-full sm:w-600">


    <x-title title="Unos nove veštine"/>

    <div class="card bg-neutral-300 flex-col p-3 mb-3">
        <form action="{{route('skill.store')}}" method="post" class="w-full">
            @csrf



            <label for="category_id" class="label">Izaberi kategoriju</label>
            <select id="category_id" name="category_id" class="w-full input">
                <option value="">Izaberite kategoriju</option>
                @foreach($allCategories as $category )
                <option value="{{$category->id}}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{$category->name}}</option>
                @endforeach
            </select>
            <div class="error">@error ('category_id'){{ $message }}@enderror</div>

            <label for="name" class="mt-4 label">Ime veštine</label>
            <input type="text" id="name" name="name" placeholder="Unesi ime veštine" value="{{old('name')}}" class="w-full input">
            <div class="error">@error ('name'){{ $message }}@enderror</div>



            <button type="submit" class="block w-full btn-yellow-medium mt-5">
                Unesi
            </button>
            <a href="{{route('skill.index')}}" class="block w-full btn-red-medium mt-5">Odustani</a>

        </form>
    </div>

</div>

@endsection
