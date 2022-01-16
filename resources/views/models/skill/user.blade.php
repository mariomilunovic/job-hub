@extends('layouts.app')

@section('content')

<div class="flex-col">

    <x-title title="Prikaz mojih veština"/>


    @foreach($userSkills as $skill)

    @if (true)
    <div class="py-2 my-2">
        <span class="btn-blue-small text-shadow">{{$skill->category->name}}</span>
        <span class="btn-red-small text-shadow">{{$skill->name}}</span>
        <span class="btn-yellow-small text-shadow">Nivo: {{$skill->pivot->points}}</span>
    </div>
    @endif

    @endforeach

</div>

@endsection
