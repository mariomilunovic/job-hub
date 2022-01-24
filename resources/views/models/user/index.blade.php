@extends('layouts.app')

@section('content')


<div class="flex-col mb-3 pb-3">

    <x-title title="Prikaz svih korisnika"/>
    @foreach ($users as $user)
    <x-user :user="$user"/>
    @endforeach

    {{$users->links()}}

</div>



@endsection
