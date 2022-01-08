@extends('layouts.app')

@section('content')

<form action="{{route('login.login')}}" method="post" class="w-full max-w-sm p-3">
    @csrf

    <h2 class="text-xl font-bold text-gray-500">Prijava</h2>
    <hr class="mb-6 border-2 border-gray-500 rounded drop-shadow">

    <label class="mt-4 text-sm font-bold text-gray-500" for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Unesi email adresu" value="{{old('email')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('email'){{ $message }}@enderror</div>

    <label class="mt-4 text-sm font-bold text-gray-500" for="password">Lozinka</label>
    <input type="password" id="password" name="password" placeholder="Unesi lozinku" value="{{old('password')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="text-sm text-red-500">@error ('password'){{ $message }}@enderror</div>

    <input class="mt-4 mr-2 leading-tight" type="checkbox">
    <span class="text-sm">Zapamti me</span>

    <button type="submit" class="w-full px-4 py-2 mt-5 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-600 focus:shadow-outline focus:outline-none">
        Prijava
    </button>

    <a href="{{route('register.form')}}" class="text-sm font-semibold text-blue-600">Napravi novi nalog</a>

</form>

@endsection
