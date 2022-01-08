@extends('layouts.app')

@section('content')

<!-- Title -->
<h2 class="text-xl font-bold text-gray-500">Prikaz svih korisnika</h2>
<hr class="mb-6 border-2 border-gray-500 rounded">

<!-- Table -->
<div class="w-full px-4 py-4 bg-gray-200 border border-gray-200 rounded shadow-lg">


    <table class="p-6 table-auto">
        <thead class="text-sm font-semibold text-gray-500 uppercase">
            <tr>
                <th class="px-4">
                    <div class="font-semibold text-left">ID</div>
                </th>

                <th class="px-4">
                    <div class="font-semibold text-left">Ime i Prezime</div>
                </th>

                <th class="px-4">
                    <div class="font-semibold text-left">Email</div>
                </th>

                <th class="px-4">
                    <div class="font-semibold text-left">Uloga</div>
                </th>

                <th class="px-4">
                    <div class="font-semibold text-left">Kreiran</div>
                </th>
                <th></th>
            </tr>
        </thead>

        <tbody class="text-sm">


            @foreach ($users as $user)

            <tr>
                <td class="px-4 py-2 whitespace-nowrap">
                    <div class="text-left">{{$user->id}}</div>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="/images/ui/user-icon.png" width="25" height="25" alt=""></div>
                        <div class="font-medium">{{$user->firstname}} {{$user->lastname}}</div>
                    </div>
                </td>

                <td class="px-4 py-2 whitespace-nowrap">
                    <div class="text-left">{{$user->email}}</div>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                    <div class="text-left">{{$user->roles()->first()->name}}</div>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                    <div class="text-left">{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</div>
                </td>
                <td class="px-4 py-2 whitespace-nowrap">
                    <a href="{{route('user.show',$user)}}" class="w-full px-4 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">Prikaži</a>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<br>
{{$users->links()}}

@endsection
