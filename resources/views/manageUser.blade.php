@extends('layout')

@section('title', 'Manage User')

@section('content')
    <div class="manageuser">
        <table width=100%>
            <tr>
                <p class="usertitle">User</p>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Auth</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_gender}}</td>
                <td><a href="/updateUser/{{$user->id}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    
@endsection