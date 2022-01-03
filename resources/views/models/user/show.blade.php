@extends('layouts.app')

@section('content')

<!-- Title -->
<h2 class="text-xl font-bold text-gray-500">Prikaz detaljnih podataka o korisniku</h2>
<hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

<!-- Table -->
<div class="px-4 py-4 w-full shadow-lg rounded border border-gray-200 bg-gray-200">


    <table class="table-auto p-6">
        <tr>
            <td class="pr-4 py-2">Ime:</td>
            <td class="px-4 py-2">{{$user->firstname}} </td>
        </tr>

        <tr>
            <td class="pr-4 py-2">Prezime:</td>
            <td class="px-4 py-2">{{$user->lastname}} </td>
        </tr>

        <tr>
            <td class="pr-4 py-2">Email:</td>
            <td class="px-4 py-2"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
        </tr>

        <tr>
            <td class="pr-4 py-2">Stanje:</td>
            <td class="px-4 py-2">{{$user->balance}} RSD</td>
        </tr>

        <tr>
            <td class="pr-4 py-2">Veštine:</td>

            @if($userSkills->count()>0)
            <td class="px-4 py-2">
                Korisnik ima {{$userSkills->count()}} veština
                <a href="{{route('skills.index',$user->id)}}" class="w-full px-4 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">Prikaži</a>
            </td>
            @else
            <td class="px-4 py-2">Korisnik nema ni jednu veštinu</td>
            @endif
        </tr>

        <tr>
            <td class="pr-4 py-2">Poslovi:</td>
            @if ($user->jobs)
            <td class="px-4 py-2">
                {{$user->jobs->count}} objavljenih poslova
                <a href="{{route('skills.index',$user->id)}}" class="w-full px-4 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">Prikaži</a>
            </td>

            @else
            <td class="px-4 py-2">Korisnik nema objavljenih poslova</td>
            @endif
        </tr>

        <tr>
            <td class="pr-4 py-2">Nalog kreiran:</td>
            <td class="px-4 py-2">{{$user->updated_at}} ({{Carbon\Carbon::parse($user->created_at)->diffForHumans()}})</td>
        </tr>

    </table>

    @endsection
