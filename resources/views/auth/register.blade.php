@extends('layouts.app')

@section('content')

<form action="{{route('registerUser')}}" method="post" class="w-full max-w-sm p-3">
    @csrf

    <h2 class="text-xl font-bold text-gray-500">Registracija</h2>
    <hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

    <label for="firstname" class="mt-4 text-sm font-bold text-gray-500">Ime</label>
    <input type="text" id="firstname" name="firstname" placeholder="Unesi ime" value="{{old('firstname')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('firstname'){{ $message }}@enderror</div>

    <label for="lastname" class="mt-4 text-sm font-bold text-gray-500">Prezime</label>
    <input type="text" id="lastname" name="lastname" placeholder="Unesi prezime" value="{{old('lastname')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('lastname'){{ $message }}@enderror</div>

    <label for="email" class="mt-4 text-sm font-bold text-gray-500">Email</label>
    <input type="text" id="email" name="email" placeholder="Unesi email" value="{{old('email')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('email'){{ $message }}@enderror</div>

    <label for="password" class="mt-4 text-sm font-bold text-gray-500">Lozinka</label>
    <input type="text" id="password" name="password" placeholder="Unesi lozinku" value="{{old('password')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('password'){{ $message }}@enderror</div>

    <label for="password_confirmation" class="mt-4 text-sm font-bold text-gray-500" >Ponovi lozinku</label>
    <input type="text" id="password" name="password_confirmation" placeholder="Ponovi lozinku" value="{{old('password')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="text-sm text-red-500">@error ('password'){{ $message }}@enderror</div>


    <button type="submit" class="w-full px-4 py-2 mt-5 font-bold text-white rounded shadow bg-yellow-500 hover:bg-yellow-600 focus:shadow-outline focus:outline-none">
        Registruj se
    </button>

    <a href="{{route('showLoginForm')}}" class="text-sm font-semibold text-blue-600">Već imam nalog</a>

</form>

@endsection
