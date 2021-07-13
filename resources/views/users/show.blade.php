@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Informacije o korisniku</h2>
        <hr>

        <div class="row">
            <div class="col-md-5">

                <table class="table table-bordered table-sm table-striped table-hover">

                    <tr>
                        <td class="col-md-3">Ime</td>
                        <td>{{$user->firstname}} </td>
                    </tr>
                    <tr>
                        <td>Prezime</td>
                        <td>{{$user->lastname}} </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                    </tr>
                    <tr>
                        <td>Kreiran</td>
                        <td> {{Carbon\Carbon::parse($user->created_at)->diffForHumans()}} ({{$user->updated_at}})
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>

@endsection
