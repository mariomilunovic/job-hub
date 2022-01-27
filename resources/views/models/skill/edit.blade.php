@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 pb-3 w-full sm:w-600">


    <x-title title="Izmena veštine"/>

    <form action="{{route('skill.update',$skill)}}" method="post" class="w-full">

        @method('put')
        @csrf

        <label for="category_id" class="label">Izaberi kategoriju</label>
        <select id="category_id" name="category_id" class="w-full input">

            @foreach($allCategories as $category )
            <option value="{{$category->id}}" {{ $category->id == $skill->category->id ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach
        </select>
        <div class="error">@error ('category_id'){{ $message }}@enderror</div>

        <label for="name" class="mt-4 label">Ime veštine</label>
        <input type="text" id="name" name="name" placeholder="Unesi ime veštine" value="{{$skill->name}}" class="w-full input">
        <div class="error">@error ('name'){{ $message }}@enderror</div>



        <button type="submit" class="block w-full btn-yellow-medium mt-5">
            Unesi
        </button>
        <a href="{{route('skill.index')}}" class="block w-full btn-red-medium mt-5">Odustani</a>

    </form>

</div>

@endsection
