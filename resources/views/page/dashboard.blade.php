@extends('layouts.app')

@section('content')
<div class="flex-col">
    <div>
        <x-title title="Dashboard"/>

    </div>
    <div class="sm:flex-col">
        {{-- <livewire:job.home /> --}}
        <div class="sm:flex justify-between">
            <div class="card text-white font-bold bg-blue-500 hover:bg-blue-600 p-3 h-64 w-full sm:w-1/2 mb-3 mr-3">Poslovi</div>
            <div class="card text-white font-bold bg-yellow-500 hover:bg-yellow-600 p-3 h-64 w-full sm:w-1/2 mb-3">Ponude</div>
        </div>
        <div class="sm:flex justify-between">
            <div class="card text-white font-bold bg-red-500 hover:bg-red-600 p-3 h-64 w-full sm:w-1/2 mb-3 mr-3">Veštine</div>
            <div class="card text-white font-bold bg-green-500 hover:bg-green-600 p-3 h-64 w-full sm:w-1/2 mb-3">Transakcije</div>
        </div>
    </div>
</div>
@endsection
