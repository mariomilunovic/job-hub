@extends('layouts.app')

@section('content')
<div class="flex-col w-80 sm:w-800">
    <div>
        <x-title title="Dashboard"/>

    </div>
    <div class="flex-col">
        {{-- <livewire:job.home /> --}}
        <div class="flex">
            <div class="card text-white font-bold bg-blue-500 hover:bg-blue-600 p-3 w-full h-64 mb-3 mr-3"><livewire:job.dashboard /></div>
            <div class="card text-white font-bold bg-yellow-500 hover:bg-yellow-600 p-3 w-full h-64 mb-3">Ponude</div>
        </div>
        <div class="flex">
            <div class="card text-white font-bold bg-red-500 hover:bg-red-600 p-3 w-full h-64 mb-3 mr-3">Veštine</div>
            <div class="card text-white font-bold bg-green-500 hover:bg-green-600 p-3 w-full h-64 mb-3">Transakcije</div>
        </div>
    </div>
</div>
@endsection
