@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3 w-full sm:w-600">


    <x-title title="Prikaz svih veština korisnika"/>


    <x-user :user="$user"/>

    <div>
        @foreach ($skillCategories as $category)

        <div class="text-2xl btn-blue-medium text-shadow mb-3">{{$category->name}}</div>

        @foreach($category->skills as $skill)

        @if($user->hasSkill($skill))
        <x-skill :skill="$skill" :user="$user"/>
        @endif

        @endforeach

        @endforeach
    </div>

</div>
@endsection
