@extends('layouts.app')

@section('content')
<div class="flex-col">
    <h2 class="text-xl font-bold text-gray-500">Dashboard</h2>
    <hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

    <div class="flex gap-3">
        <livewire:job.dashboard />
        <div class="card text-white font-bold bg-yellow-400 w-64 h-64 p-3 mb-3">Ponude</div>
        <div class="card text-white font-bold bg-red-400 w-64 h-64 p-3 mb-3">Veštine</div>
        <div class="card text-white font-bold bg-green-400 w-64 h-64 p-3 mb-3">Transakcije</div>
    </div>
</div>
@endsection
