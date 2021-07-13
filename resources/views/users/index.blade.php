@extends('layouts.app')

@section('content')

    <div class="container">


        <h2>Prikaz svih korisnika</h2>
        <hr>

        <div class="row">
            <div class="col-md-10">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                    <tr class="info">
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th class="text-center">Administrator</th>
                        <th class="text-center">Manager</th>
                        <th class="text-center">Standard user</th>
                        <th></th>

                    </tr>
                    </thead>

                    @foreach ($users as $user)

                        <tr>

                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>

                            <td>
                                @if($user->hasRole('administrator'))
                                    <div class="text-center">&#x2714</div>
                                @endif
                            </td>

                            <td>
                                @if($user->hasRole('manager'))
                                    <div class="text-center">&#x2714</div>
                                @endif
                            </td>

                            <td>
                                @if($user->hasRole('user'))
                                    <div class="text-center">&#x2714</div>
                                @endif
                            </td>

                            <td><a href="{{route('users.show',$user->id)}}"><button class="btn btn-primary btn-block btn-sm">Detalji</button></a></td>



                    @endforeach

                </table>
                <br>
                {{$users->links()}}
            </div>

        </div>

@endsection
