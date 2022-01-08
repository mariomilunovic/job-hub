@extends('layouts.app')

@section('content')

<!-- Title -->
<h2 class="text-xl font-bold text-gray-500">Prikaz mojih veština</h2>
<hr class="mb-3 border-2 border-gray-500 rounded">





@foreach($userSkills as $skill)

@if (true)
<div class="py-3">
    <span class="btn-blue-small text-shadow">{{$skill->category->name}}</span>
    <span class="btn-red-small text-shadow">{{$skill->name}}</span>
    <span class="btn-yellow-small text-shadow">LEVEL: {{$skill->pivot->points}}</span>
</div>
@endif

@endforeach


</div>



<br>


@endsection
