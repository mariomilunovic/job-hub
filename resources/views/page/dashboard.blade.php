@extends('layouts.app')

@section('content')
<div class="flex-col">
    <h2 class="text-xl font-bold text-gray-500">Dashboard</h2>
    <hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

    <div class="flex gap-3">
        <div class="card text-white font-bold bg-red-500 w-64 h-64 p-3 mb-3">Card1</div>
        <div class="card text-white font-bold bg-blue-500 w-64 h-64 p-3 mb-3">Card2</div>
        <div class="card text-white font-bold bg-green-500 w-64 h-64 p-3 mb-3">Card3</div>
        <div class="card text-white font-bold bg-yellow-500 w-64 h-64 p-3 mb-3">Card4</div>
    </div>
</div>
@endsection
