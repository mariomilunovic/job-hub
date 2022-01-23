@extends('layouts.app')

@section('content')



<form action="{{route('user.update',$user)}}" method="post" autocomplete="off">

    @method('put')
    @csrf

    <x-title title="Izmena korisnika"/>

    <div class="card bg-blue-300 flex-col p-3 mb-3">

        <label for="firstname" class="label">Ime</label>
        <input autocomplete="false" type="text" id="firstname" name="firstname" placeholder="Unesi ime" value="{{$user->firstname}}" class="input">
        <div class="error">@error ('firstname'){{ $message }}@enderror</div>

        <label for="lastname" class="label">Prezime</label>
        <input autocomplete="false" type="text" id="lastname" name="lastname" placeholder="Unesi prezime" value="{{$user->lastname}}" class="input">
        <div class="error">@error ('lastname'){{ $message }}@enderror</div>

        <label for="email" class="label">Email</label>
        <input autocomplete="false" type="text" id="email" name="email" placeholder="Unesi email" value="{{$user->email}}" class="input">
        <div class="error">@error ('email'){{ $message }}@enderror</div>

        <label for="role_id" class="label">Uloga</label>
        <select id="role_id" name="role_id" class="input">
            @foreach($roles as $role )
            <option value="{{$role->id}}" {{$role->id == $user->roles()->first()->id ?'selected':''}}>{{$role->name}}</option>
            @endforeach
        </select>
        <div class="error">@error('role_id'){{ $message }}@enderror</div>

        <label for="password" class="label">Lozinka</label>
        <input autocomplete="false"type="password" id="password" name="password" placeholder="Unesi lozinku" value="" class="input">
        <div class="error">@error ('password'){{ $message }}@enderror</div>

        <label for="password_confirmation" class="label" >Ponovi lozinku</label>
        <input autocomplete="false" type="password" id="password" name="password_confirmation" placeholder="Ponovi lozinku" value="" class="input">
        <div class="error">@error ('password'){{ $message }}@enderror</div>


        <div class="flex-col">
            <button type="submit" class="w-full mt-5 btn-blue-medium">
                Potvrdi izmene
            </button>
            <a href="{{route('user.show',$user)}}" class="block w-full btn-red-medium mt-4">Odustani</a>
        </div>
    </div>
</form>



@endsection
