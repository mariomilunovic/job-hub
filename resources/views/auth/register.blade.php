@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <br>

                <div class="card">

                    <div class="card-header bg-dark text-white font-weight-bold">Registracija</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col">

                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{session('error')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="firstname" class="font-weight-bold">Ime</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Unesi ime" value="{{old('firstname')}}">
                                        <span class="text-danger" role="alert"> <strong>@error('firstname'){{ $message }}@enderror</strong></span>

                                    </div>

                                    <div class="form-group">
                                        <label for="lastname" class="font-weight-bold">Prezime</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Unesi prezime" value="{{old('lastname')}}">
                                        <span class="text-danger" role="alert"> <strong>@error('lastname'){{ $message }}@enderror</strong></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="font-weight-bold">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Unesi email" value="{{old('email')}}">
                                        <span class="text-danger" role="alert"> <strong>@error('email'){{ $message }}@enderror</strong></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="font-weight-bold">Lozinka</label>
                                        <input type="password" class="form-control" name="password" placeholder="Unesi lozinku">
                                        <span class="text-danger" role="alert"> <strong>@error('password'){{ $message }}@enderror</strong></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation" class="font-weight-bold">Ponovi lozinku</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Ponovi unetu lozinku">
                                        <span class="text-danger" role="alert"> <strong>@error('password'){{ $message }}@enderror</strong></span>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-primary">Registruj se</button>
                                    </div>

                                    <a href="login" class="register">Već imam nalog</a>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
