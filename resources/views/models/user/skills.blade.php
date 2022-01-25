@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz najboljih korisnika za izabranu veštinu"/>

    <x-skill :skill="$skill"/>

    @foreach ($users as $user)
    <div class="relative">


        <x-user :user="$user"/>

        <div class="absolute right-64 top-5 px-2 py-1 mx-4 text-xs font-bold  text-red-100 bg-red-600 rounded-full">
        {{-- <div class="absolute text-xl right-2 top-1 text-white text-shadow-md  mt-3 mr-96"> --}}
            NIVO : {{$user->pivot->points}}
        </div>

    </div>
    @endforeach

    {{$users->links()}}

</div>


@endsection
