@extends('layouts.app')

@section('content')

<!-- Title -->
<h2 class="text-xl font-bold text-gray-500">Prikaz svih veština</h2>
<hr class="mb-3 border-2 border-gray-500 rounded">


@foreach ($allCategories as $category)
<div class="py-3 my-3 text-sm">
    <span class="btn-blue-small text-shadow">{{$category->name}}</span>

    @foreach($category->skills as $skill)
    <span class="btn-red-small text-shadow">{{$skill->name}}</span>
    @endforeach

    @if (auth()->user()->hasRole('administrator'))
    <a href="{{route('skills.create',$category)}}"><span class="btn-yellow-small text-shadow"> + dodaj </span></a>
    <br>
    @endif
</div>
@endforeach

<br>


@endsection
