@extends('layouts.app')
@section('content')
    <h1 class=" my-3">All Users</h1>
    <div class="table-responsive">
        <table class="table table-striped m-auto my-5 opacity-75 rounded" style="width: 95%; background-color: #cff4fc;">
            <thead class="text-danger">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Driving License</th>
                <th>Address</th>
                <th>CIN</th>
                <th>Delete User</th>
              </tr>
            </thead>
            <tbody class="">
                @foreach($users as $user)
                    <tr class=" ">
                        <td class="text-danger fw-bold">{{$loop->iteration}}</td>
                        <td class="text-secondary fw-bold">{{$user->name}}</td>
                        <td class="text-secondary fw-bold"> {{$user->email}} </td>
                        <td class="text-secondary fw-bold"> {{$user->driving_license_photo}} </td>
                        <td class="text-secondary fw-bold"> {{$user->address}} </td>
                        <td class="text-secondary fw-bold"> {{$user->CIN}} </td>
                        <td>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<style>
body {
    background-image: url(../images/users-bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;   
}
/* main {
        background-color: #d6d6d6;
        height: 100%;
    } */
h1 {
    width: 95%;
    margin: auto;
}
tr {
    height: 50px;
}
</style>
