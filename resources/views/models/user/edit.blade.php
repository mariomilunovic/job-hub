@extends('layouts.app')

@section('content')

<form action="{{route('user.update',$user)}}" method="post" class="w-full max-w-sm p-3">

    @method('put')
    @csrf

    <h2 class="text-xl font-bold text-gray-500">Izmena korisnika</h2>
    <hr class="mb-6 border-2 border-gray-500 rounded">

    <label for="firstname" class="mt-4 text-sm font-bold text-gray-500">Ime</label>
    <input type="text" id="firstname" name="firstname" placeholder="Unesi ime" value="{{$user->firstname}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('firstname'){{ $message }}@enderror</div>

    <label for="lastname" class="mt-4 text-sm font-bold text-gray-500">Prezime</label>
    <input type="text" id="lastname" name="lastname" placeholder="Unesi prezime" value="{{$user->lastname}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('lastname'){{ $message }}@enderror</div>

    <label for="email" class="mt-4 text-sm font-bold text-gray-500">Email</label>
    <input type="text" id="email" name="email" placeholder="Unesi email" value="{{$user->email}}" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('email'){{ $message }}@enderror</div>

    <label for="role_id" class="mt-4 text-sm font-bold text-gray-500">Uloga</label>
    <select id="role_id" name="role_id" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded focus:outline-none focus:bg-white focus:border-purple-500">
        <option value="">Izaberite ulogu</option>
        @foreach($roles as $role )
        <option value="{{$role->id}}"{{$role->id == $user->roles()->first()->id ?'selected':''}}>{{$role->name}}</option>
        @endforeach
    </select>
    <div class="mb-3 text-sm text-red-500">@error('role_id'){{ $message }}@enderror</div>

    <label for="password" class="mt-4 text-sm font-bold text-gray-500">Lozinka</label>
    <input type="password" id="password" name="password" placeholder="Unesi lozinku" value="" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="mb-3 text-sm text-red-500">@error ('password'){{ $message }}@enderror</div>

    <label for="password_confirmation" class="mt-4 text-sm font-bold text-gray-500" >Ponovi lozinku</label>
    <input type="password" id="password" name="password_confirmation" placeholder="Ponovi lozinku" value="" class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-purple-500">
    <div class="text-sm text-red-500">@error ('password'){{ $message }}@enderror</div>




    <div class="flex-col">
        <button type="submit" class="w-full mt-3 btn-blue-medium">
            Potvrdi izmene
        </button>
        <a href="{{route('user.show',$user)}}" class="block btn-red-medium">Odustani</a>
    </div>


</form>

@endsection
