@extends('layout')

@section('title', 'Profile Page')

@section('content')
 <h2 id="insertTitle">Update User</h2><br>
    <div class="edituser">
        <form>
            <table width=100%>
                <tr>
                    <td>
                        <img src="/ahegao.jpg" alt="Profile Picture">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="UserID"><br><br>
                        <input type="text" placeholder="username"><br><br>
                        <input type="email" placeholder="email address"><br><br>
                        <select name="gender" name="gender">
                            <option selected>Male</option>
                            <option>Female</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="button">Discard Changes</button>
            <button type="button">Save Changes</button>
            <button id="delete" type="button">Delete User</button>
        </form>
    </div>
@endsection