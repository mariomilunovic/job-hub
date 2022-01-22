@extends('layouts.app')

@section('content')


<div class="flex-col sm:w-600">


    <x-title title="Prikaz svih veština"/>

    <div>
        @foreach ($allCategories as $category)

        <div class="text-2xl btn-blue-medium text-shadow mb-3">{{$category->name}}</div>

        @foreach($category->skills as $skill)
        <x-skill :skill="$skill"/>
        @endforeach

        @auth
        @if (auth()->user()->hasRole('administrator'))
        <a href="{{route('skill.create',$category)}}"><span class="btn-yellow-medium text-shadow block w-full"> + dodaj </span></a>
        <br>
        @endif
        @endauth

        @endforeach
    </div>



</div>


@endsection
