@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 p-3">

    <x-title title="Prikaz svih ponuda"/>

    <x-bid :bid="$bid"/> 

</div>


@endsection
