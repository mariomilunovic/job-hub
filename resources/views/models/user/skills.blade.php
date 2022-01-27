@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3 w-full sm:w-600">

    <x-title title="Prikaz najboljih korisnika za izabranu veštinu"/>

    <x-skill :skill="$skill" :user="null"/>

    @foreach ($users as $user)
    <div class="relative">


        <x-user :user="$user"/>

        <div class="absolute top-4 left-64 px-2 py-1 mx-4 text-xs font-bold  text-red-100 bg-red-600 rounded-full">
            NIVO : {{$user->pivot->points}}
        </div>

    </div>
    @endforeach

    {{$users->links()}}

</div>


@endsection
