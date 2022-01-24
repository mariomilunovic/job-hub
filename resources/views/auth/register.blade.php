@extends('layouts.app')

@section('content')

<form action="{{route('register.register')}}" method="post" autocomplete="off">
    @csrf

    <x-title title="Registracija"/>

    <label for="firstname" class="mt-4 text-sm font-bold text-gray-500">Ime</label>
    <input type="text" autocomplete="false" id="firstname" name="firstname" placeholder="Unesi ime" value="{{old('firstname')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 error">@error ('firstname'){{ $message }}@enderror</div>

    <label for="lastname" class="mt-4 text-sm font-bold text-gray-500">Prezime</label>
    <input type="text" autocomplete="false" id="lastname" name="lastname" placeholder="Unesi prezime" value="{{old('lastname')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 error">@error ('lastname'){{ $message }}@enderror</div>

    <label for="email" class="mt-4 text-sm font-bold text-gray-500">Email</label>
    <input type="text" autocomplete="false" id="email" name="email" placeholder="Unesi email" value="{{old('email')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 error">@error ('email'){{ $message }}@enderror</div>

    <label for="password" class="mt-4 text-sm font-bold text-gray-500">Lozinka</label>
    <input type="password" autocomplete="false" id="password" name="password" placeholder="Unesi lozinku" value="{{old('password')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 error">@error ('password'){{ $message }}@enderror</div>

    <label for="password_confirmation" class="mt-4 text-sm font-bold text-gray-500" >Ponovi lozinku</label>
    <input type="password" autocomplete="false" id="password" name="password_confirmation" placeholder="Ponovi lozinku" value="{{old('password')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="error">@error ('password'){{ $message }}@enderror</div>


    <button type="submit" class="w-full px-4 py-2 mt-5 font-bold text-white rounded shadow bg-yellow-500 hover:bg-yellow-600 focus:shadow-outline focus:outline-none">
        Registruj se
    </button>

    <a href="{{route('login.form')}}" class="text-sm font-semibold text-blue-600">Već imam nalog</a>

</form>

@endsection
