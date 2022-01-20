@extends('layouts.app')

@section('content')

<div class="flex-col w-600">

    <x-title title="Prikaz svih informacija o izabranoj veštini"/>

    <x-skill :skill="$skill"/>

</div>

@endsection
