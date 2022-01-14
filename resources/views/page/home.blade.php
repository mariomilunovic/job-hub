@extends('layouts.app')

@section('content')
<div class="flex-col">
    <h2 class="text-xl font-bold text-gray-500">Welcome to job hub!</h2>
    <hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

    <div class="flex gap-3">
        <div class="card text-white font-bold bg-blue-500 hover:bg-blue-600 w-64 h-64 p-3 mb-3">Poslovi</div>
        <div class="card text-white font-bold bg-yellow-500 hover:bg-yellow-600 w-64 h-64 p-3 mb-3">Ponude</div>
        <div class="card text-white font-bold bg-red-500 hover:bg-red-600 w-64 h-64 p-3 mb-3">Veštine</div>
        <div class="card text-white font-bold bg-green-500 hover:bg-green-600 w-64 h-64 p-3 mb-3">Transakcije</div>
    </div>
</div>
@endsection
