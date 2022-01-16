@extends('layouts.app')

@section('content')

<div class="flex-col">


    <x-title title="Unos nove veštine"/>

    <form action="{{route('skill.store')}}" method="post" class="w-full">
        @csrf



        <label for="category_id" class="mt-4 text-sm font-bold text-gray-500">Izaberi kategoriju</label>
        <select id="category_id" name="category_id" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
            <option value="">Izaberite kategoriju</option>
            @foreach($allCategories as $category )
            <option value="{{$category->id}}" {{ (old("category_id") == $category->id ? "selected":"") }}>{{$category->name}}</option>
            @endforeach
        </select>
        <div class="mb-3 text-sm text-red-500">@error ('category_id'){{ $message }}@enderror</div>

        <label for="name" class="mt-4 text-sm font-bold text-gray-500">Ime veštine</label>
        <input type="text" id="name" name="name" placeholder="Unesi ime veštine" value="{{old('name')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
        <div class="mb-3 text-sm text-red-500">@error ('name'){{ $message }}@enderror</div>



        <button type="submit" class="block w-full btn-yellow-medium mt-5">
            Unesi
        </button>
        <a href="{{route('skill.index')}}" class="block w-full btn-red-medium mt-5">Odustani</a>

    </form>

</div>

@endsection
