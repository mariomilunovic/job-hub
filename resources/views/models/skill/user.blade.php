@extends('layouts.app')

@section('content')


<div class="flex-col sm:w-600">


    <x-title title="Prikaz mojih veština"/>

    <div>
        @foreach ($skillCategories as $category)

        <div class="text-2xl btn-blue-medium text-shadow mb-3">{{$category->name}}</div>

        @foreach($category->skills as $skill)

        @if($user->hasSkill($skill))
        <x-skill :skill="$skill"/>
        @endif

        @endforeach

        @endforeach
    </div>

</div>
@endsection
