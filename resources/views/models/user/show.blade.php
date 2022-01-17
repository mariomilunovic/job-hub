@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz svih podataka o korisniku"/>

    <x-user :user="$user"/>

</div>

@endsection
