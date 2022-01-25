@extends('layouts.app')

@section('content')
<div class="flex-col w-80 sm:w-800">

    <x-title title="Pregled"/>


    <div class="flex-col">

        <div class="sm:flex">
            <div class="card text-white font-bold bg-blue-500 hover:bg-blue-600 p-3 w-full h-60 mb-3 mr-3 justify-center items-start">
                <livewire:job.dashboard />
            </div>

            <div class="card text-white font-bold bg-yellow-500 hover:bg-yellow-600 p-3 w-full h-60 mb-3 justify-center items-start">
                <livewire:bid.dashboard />
            </div>
        </div>

        <div class="sm:flex">
            <div class="card text-white font-bold bg-red-500 hover:bg-red-600 p-3 w-full h-60 mb-3 mr-3 justify-center items-start">
                <livewire:skill.dashboard />
            </div>
            <div class="card text-white font-bold bg-green-500 hover:bg-green-600 p-3 w-full h-60 mb-3 justify-center items-start">
                <livewire:transaction.dashboard />
            </div>
        </div>

    </div>

</div>
@endsection
