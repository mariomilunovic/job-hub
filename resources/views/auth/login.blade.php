@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <br><br>

                <div class="card">

                    <div class="card-header bg-dark text-white font-weight-bold">Prijava</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col">

                                <form action="{{route('login')}}" method="post">
                                    @csrf


                                    <div class="form-group">
                                        <label for="email" class="font-weight-bold">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Unesi email adresu" value="{{old('email')}}">
                                        <span class="text-danger" role="alert"> <strong>@error('email'){{ $message }}@enderror</strong></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="font-weight-bold">Lozinka</label>
                                        <input type="text" class="form-control" name="password"  placeholder="Unesi lozinku">
                                        <span class="text-danger" role="alert"> <strong>@error('password'){{ $message }}@enderror</strong></span>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name='remember' id="remember">
                                        <label class="form-check-label" for="remember">
                                            Zapamti me
                                        </label>
                                    </div>


                                    <div class="form-group pt-4">
                                        <button type="submit" class="btn btn-block btn-primary">Prijava</button>
                                    </div>

                                    <a href="register" class="register">Napravi novi nalog</a>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
