@extends('layouts.app')

@section('content')

<div class="flex-col mb-3 pb-3 w-full sm:w-800">

    <x-title title="Prikaz svih ponuda"/>

    <x-bid :bid="$bid"/>

</div>


@endsection
