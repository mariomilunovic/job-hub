@extends('layouts.app')

@section('content')

<!-- Title -->
<h2 class="text-xl font-bold text-gray-500">Prikaz detaljnih podataka o korisniku</h2>
<hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

<!-- Table -->
<div class="w-full px-4 py-4 bg-gray-200 border border-gray-200 rounded shadow-lg">


    <table class="p-6 table-fixed">

        <tr>
            <td class="py-2 pr-4">ID:</td>
            <td class="px-4 py-2">{{$user->id}} </td>
        </tr>
        <tr>
            <td class="py-2 pr-4">Ime:</td>
            <td class="px-4 py-2">{{$user->firstname}} </td>
        </tr>

        <tr>
            <td class="py-2 pr-4">Prezime:</td>
            <td class="px-4 py-2">{{$user->lastname}} </td>
        </tr>

        <tr>
            <td class="py-2 pr-4">Uloga:</td>
            <td class="px-4 py-2">{{$user->roles()->first()->name}} </td>
        </tr>

        <tr>
            <td class="py-2 pr-4">Email:</td>
            <td class="px-4 py-2"><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
        </tr>

        <tr>
            <td class="py-2 pr-4">Veštine:</td>

            @if($userSkills)
            <td  class="px-4 py-2">
                <span class="pr-4">{{$userSkills->count()}}</span>
                <a href="{{route('skills.user',$user)}}" class="btn-purple-small">Prikaži</a>

            </td>
            @else
            <td class="px-4 py-2">Korisnik nema ni jednu veštinu</td>
            @endif
        </tr>

        <tr>
            <td class="py-2 pr-4">Poslovi:</td>
            @if ($userJobs)
            <td class="px-4 py-2">
                <span class="pr-4">{{$userJobs->count()}}</span>
                <a href="{{route('jobs.user',$user)}}" class="btn-purple-small">Prikaži</a>

            </td>

            @else
            <td class="px-4 py-2">Korisnik nema objavljenih poslova</td>
            @endif
        </tr>

        <tr>
            <td class="py-2 pr-4">Ponude:</td>
            @if ($userBids)
            <td class="px-4 py-2">
                <span class="pr-4">{{$userBids->count()}}</span>
                <a href="{{route('bids.user',$user)}}" class="btn-purple-small">Prikaži</a>

            </td>

            @else
            <td class="px-4 py-2">Korisnik nema datih ponuda</td>
            @endif
        </tr>

        <tr>
            <td class="py-2 pr-4">Stanje:</td>
            <td class="px-4 py-2">{{$user->balance}} RSD</td>
        </tr>

        <tr>
            <td class="py-2 pr-4">Nalog kreiran:</td>
            <td class="px-4 py-2">{{$user->updated_at}} ({{Carbon\Carbon::parse($user->created_at)->diffForHumans()}})</td>
        </tr>

    </table>

    <hr class="mb-6 border-2 border-gray-200 rounded drop-shadow">

    <form action="{{route('users.destroy',$user)}}" method="post">
        @csrf
        <div class="flex-col">
            <a href="{{route('users.edit',$user)}}" class="block btn-blue-medium">Izmeni</a>

        </div>
        <button type="submit" class="block w-full btn-red-medium">
            Obriši
        </button>
    </form>
    @endsection
