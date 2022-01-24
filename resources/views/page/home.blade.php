@extends('layouts.app')

@section('content')
<div class="flex-col">
    <div>
        <x-title title="Dobrodošli"/>

    </div>
    <div class="sm:flex-col">
        {{-- <livewire:job.home /> --}}
        <div class="sm:flex">
            <div class="card text-white font-bold bg-blue-500 hover:bg-blue-600 p-3 w-64 m-3">Ponude</div>
            <div class="card text-white font-bold bg-yellow-500 hover:bg-yellow-600 p-3 w-64 m-3">Ponude</div>
        </div>
        <div class="sm:flex">
            <div class="card text-white font-bold bg-red-500 hover:bg-red-600 p-3 w-64 m-3">Veštine</div>
            <div class="card text-white font-bold bg-green-500 hover:bg-green-600 p-3 w-64 m-3">Transakcije</div>
        </div>
    </div>
</div>
@endsection
