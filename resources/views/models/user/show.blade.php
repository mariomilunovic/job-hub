@extends('layouts.app')

@section('content')

<!-- Title -->
<h2 class="text-xl font-bold text-gray-500">Prikaz detaljnih podataka o korisniku</h2>
<hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

<!-- Table -->
<div class="px-4 py-4 w-full shadow-lg rounded border border-gray-200 bg-gray-200">


    <table class="table-auto p-6">
        <tr>
            <td>Ime</td>
            <td>{{$user->firstname}} </td>
        </tr>

        <tr>
            <td>Prezime</td>
            <td>{{$user->lastname}} </td>
        </tr>

        <tr>
            <td>Email</td>
            <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
        </tr>

        <tr>
            <td>Stanje</td>
            <td>{{$user->balance}} RSD</td>
        </tr>

        <tr>
            <td>Veštine</td>

            @if($userSkills->count()>0)
            <td>
                @foreach ($userSkills as $skill)
                <span class="font-weight-bold btn btn-warning btn-sm">{{$skill->name}} - LEVEL {{$skill->pivot->points}}</span>

                @endforeach
            </td>
            @else
            <td>Korisnik nema ni jednu veštinu</td>
            @endif
        </tr>

        <tr>
            <td>Poslovi</td>
            @if ($user->jobs)
            <td>{{$user->jobs->count}} objavljenih poslova</td>
            @else
            <td>Korisnik nema objavljenih poslova</td>
            @endif
        </tr>

        <tr>
            <td>Nalog kreiran</td>
            <td>{{$user->updated_at}} ({{Carbon\Carbon::parse($user->created_at)->diffForHumans()}})</td>
        </tr>

    </table>

    @endsection
