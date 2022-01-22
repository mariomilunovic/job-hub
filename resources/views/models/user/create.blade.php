@extends('layouts.app')

@section('content')

<div class="flex-col justify-items-center p-3">

    <x-title title="Unos novog korisnika"/>

    <form action="{{route('user.store')}}" method="post" class="" autocomplete="off">

        @csrf

        <!-- User input start -->
        <div class="card bg-neutral-400 flex-col p-3 mb-3">

            <label for="firstname" class="label">Ime</label>
            <input autocomplete="false" type="text" id="firstname" name="firstname" placeholder="Unesi ime" value="{{old('firstname')}}" class="w-full input">
            <div class="error">@error ('firstname'){{ $message }}@enderror</div>

            <label for="lastname" class="label">Prezime</label>
            <input autocomplete="false" type="text" id="lastname" name="lastname" placeholder="Unesi prezime" value="{{old('lastname')}}" class="w-full input">
            <div class="error">@error ('lastname'){{ $message }}@enderror</div>

            <label for="email" class="label">Email</label>
            <input autocomplete="false" type="text" id="email"name="email" placeholder="Unesi email" value="{{old('email')}}" class="w-full input">
            <div class="error">@error ('email'){{ $message }}@enderror</div>

            <label for="role_id" class="label">Uloga</label>
            <select id="role_id" name="role_id" class="w-full input">
                <option value="">Izaberite ulogu</option>
                @foreach($roles as $role )
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            <div class="error">@error('role_id'){{ $message }}@enderror</div>

            <label for="password" class="label">Lozinka</label>
            <input autocomplete="false" type="password" id="password" name="password" placeholder="Unesi lozinku" value="{{old('password')}}" class="w-full input">
            <div class="error">@error ('password'){{ $message }}@enderror</div>

            <label for="password_confirmation" class="label" >Ponovi lozinku</label>
            <input autocomplete="false" type="password" id="password" name="password_confirmation" placeholder="Ponovi lozinku" value="{{old('password')}}" class="w-full input">
            <div class="error">@error ('password'){{ $message }}@enderror</div>


            <button type="submit" class="mt-3 w-full btn-blue-medium">
                Unesi
            </button>
            <a href="{{route('user.index')}}" class="block mt-3 w-full btn-red-medium">Odustani</a>
        </div>
        <!-- User input end -->

    </form>
</div>


@endsection
