@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 pb-3 w-full sm:w-600">

    <x-title title="Prikaz svih informacija o izabranoj veštini"/>

    <x-skill :skill="$skill" :expanded=true :user="null"/>

</div>

@endsection
