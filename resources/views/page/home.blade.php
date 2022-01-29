@extends('layouts.app')

@section('content')
<div class="flex-col mb-3 pb-3 w-full sm:w-800">

    <x-title title="Dobrodošli!"/>


    <div class="flex-col pb-3">

        <div class="sm:flex">
            <div class="card text-white font-bold bg-blue-500 hover:bg-blue-600 p-3 w-full h-60 mb-3 mr-3 justify-center items-start">
                <livewire:job.home />
            </div>

            <div class="card text-white font-bold bg-yellow-500 hover:bg-yellow-600 p-3 w-full h-60 mb-3 justify-center items-start">
                <livewire:bid.home />
            </div>
        </div>

        <div class="sm:flex">
            <div class="card text-white font-bold bg-red-500 hover:bg-red-600 p-3 w-full h-60 mb-3 mr-3 justify-center items-start">
                <livewire:skill.home />
            </div>
            <div class="card text-white font-bold bg-green-500 hover:bg-green-600 p-3 w-full h-60 mb-3 justify-center items-start">
                <livewire:transaction.home />
            </div>
        </div>

    </div>

</div>
@endsection
