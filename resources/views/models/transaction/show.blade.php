@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz podataka o transakciji"/>

    <x-transaction :transaction="$transaction"/>

</div>

@endsection
