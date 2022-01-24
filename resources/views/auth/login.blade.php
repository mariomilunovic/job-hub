@extends('layouts.app')

@section('content')

<div class="w-80 md:w-96 md:max-w-fit">
    <form action="{{route('login.login')}}" method="post" autocomplete="off">
        @csrf

        <x-title title="Prijava"/>

        <label class="mt-4 text-sm font-bold text-gray-500" for="email">Email</label>
        <input type="text" autocomplete="false" id="email" name="email" placeholder="marko@safemail.com" value="{{old('email')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
        <div class="mb-3 error">@error ('email'){{ $message }}@enderror</div>

        <label class="mt-4 text-sm font-bold text-gray-500" for="password">Lozinka</label>
        <input type="password" autocomplete="false" id="password" name="password" placeholder="123123" value="{{old('password')}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
        <div class="text-sm error">@error ('password'){{ $message }}@enderror</div>

        <input class="mt-4 mr-2 leading-tight" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
        <span class="text-sm">Zapamti me</span>

        <button type="submit" class="w-full px-4 py-2 mt-5 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-600 focus:shadow-outline focus:outline-none">
            Prijava
        </button>

        <a href="{{route('register.form')}}" class="text-sm font-semibold text-blue-600">Napravi novi nalog</a>

    </form>
</div>
@endsection
