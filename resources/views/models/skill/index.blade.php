@extends('layouts.app')

@section('content')


<div class="flex-col">


    <x-title title="Prikaz svih veština"/>


    @foreach ($allCategories as $category)
    <div class="py-3 my-2">
        <span class="btn-blue-small text-shadow">{{$category->name}}</span>

        @foreach($category->skills as $skill)
        <span class="btn-red-small text-shadow">{{$skill->name}}</span>
        @endforeach

        @if (auth()->user()->hasRole('administrator'))
        <a href="{{route('skill.create',$category)}}"><span class="btn-yellow-small text-shadow"> + dodaj </span></a>
        <br>
        @endif
    </div>
    @endforeach

</div>


@endsection
