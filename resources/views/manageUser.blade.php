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
            <tr>
                <td>1</td>
                <td>admin</td>
                <td>admin@admin</td>
                <td>Male</td>
                <td><a href="#">Edit</a></td>
            </tr>
        </table>
    </div>
    
@endsection