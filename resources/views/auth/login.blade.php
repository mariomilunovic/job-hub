@extends('layouts.app')

@section('content')

<form action="{{route('login')}}" method="post" class="w-full max-w-sm p-3">
    @csrf

    <h2 class="font-bold text-xl text-gray-500">Prijava</h2>
    <hr class="mb-6 divide-gray-700">

    <label class="mt-4 text-sm text-gray-500 font-bold" for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Unesi email adresu" value="{{old('email')}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('email'){{ $message }}@enderror</div>

    <label class="mt-4 text-sm text-gray-500 font-bold" for="password">Lozinka</label>
    <input type="text" id="password" name="password" placeholder="Unesi lozinku" value="{{old('password')}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="text-sm text-red-500">@error ('password'){{ $message }}@enderror</div>

    <input class="mr-2 mt-4 leading-tight" type="checkbox">
    <span class="text-sm">Zapamti me</span>

    <button type="submit" class="mt-5 w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
        Prijava
    </button>

    <a href="register" class="text-sm font-semibold text-blue-600">Napravi novi nalog</a>

</form>

@endsection
