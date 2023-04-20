@extends('layouts.app')
@section('content')
    <h1 class="text-light text-center my-5 mx-4">All Users</h1>
    <div class="table-responsive">
        <table class="table table-striped m-auto opacity-75 rounded" style="width: 95%; background-color: #;">
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
                        <td class="text-secondary fw-bold"> <a href="driving_license_photos/{{$user->driving_license_photo}}">See driver's license</a> </td>
                        <td class="text-secondary fw-bold"> {{$user->address}} </td>
                        <td class="text-secondary fw-bold"> {{$user->CIN}} </td>
                        @if($user->hasRole("user"))
                            <td>
                                <form id="delete-form" action="{{route("destroy user", $user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="delete-user" type="submit" class="btn btn-danger mx-2">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            let deleteButton = document.getElementById("delete-user");
            deleteButton.addEventListener("click", function(event){
                event.preventDefault(); 
                if (confirm("Are you sure you want to delete this user?")) {
                    document.getElementById("delete-form").submit(); 
                }
            });
        });
      </script>
@endsection
<style>

body {

    /* background-image: url(../images/users-bg.jpg); */
    background-color: none;
    background: rgb(238, 236, 236) !important;
}
h1 {
    width: 30%;
    background-color: rgb(211, 198, 198);
    border-radius: 7px;
    padding: 10px;
}
tr {
    height: 50px;
}
</style>
