@extends('layouts.app')

@section('content')

<div class="flex-col">

    <!-- Title -->
    <h2 class="text-xl font-bold text-gray-500">Prikaz mojih veština</h2>
    <hr class="mb-2 border-2 border-gray-500 rounded">


    @foreach($userSkills as $skill)

    @if (true)
    <div class="py-3 my-2">
        <span class="btn-blue-small text-shadow">{{$skill->category->name}}</span>
        <span class="btn-red-small text-shadow">{{$skill->name}}</span>
        <span class="btn-yellow-small text-shadow">LEVEL: {{$skill->pivot->points}}</span>
    </div>
    @endif

    @endforeach

</div>

@endsection
