@extends('layout')

@section('title', 'Profile Page')

@section('content')
 <h2 id="insertTitle">Update User</h2><br>
    <div class="edituser">
        <form method="POST">
            {{csrf_field()}}
            <p style="color: red">{{$error}}</p>
            <table width=100%>
                <tr>
                    <td>
                        <img src="/storage/{{$user->user_picture}}" alt="Profile Picture">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="text" placeholder="UserID" value="{{$user->id}}"disabled><br><br>
                        <input type="text" placeholder="username" name="name" value="{{$user->user_name}}"><br><br>
                        <input type="email" placeholder="email address" name="email" value="{{$user->email}}"><br><br>
                        <select name="gender" name="gender">
                            @if($user->user_gender == 'Male')
                                <option selected>Male</option>
                                <option>Female</option>
                            @else
                                <option>Male</option>
                                <option selected>Female</option>
                            @endif
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" formaction="/cancelUpdateUser">Discard Changes</button>
            <button type="submit" formaction="/doUpdateUser">Save Changes</button>
            <button id="delete" type="submit" formaction="/deleteUser">Delete User</button>
        </form>
    </div>
@endsection