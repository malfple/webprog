@extends('layout')

@section('title', 'Profile Page')

@section('content')
    <div class="register-page">
        <div class="form">
            <div class="profile">
                <div class="profilepic">
                    <img src="storage/{{$user->user_picture}}" alt="profile pic">
                </div>
                <div class="profiledetail">
                    <p>{{$user->user_name}}</p>
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <form class="register-form">
                <input type="text" placeholder="UserID" value="{{$user->id}}" disabled="true">
                <input type="text" placeholder="Name" value="{{$user->user_name}}">
                <input type="text" placeholder="Email Address" value="{{$user->email}}">
                <input type="password" placeholder="Change Password">
                <select name="gender" selected="Male">
                    @can('isMale', $user)
                        <option selected>Male</option>
                        <option>Female</option>
                    @endcan
                    @can('isNotMale', $user)
                        <option selected>Male</option>
                        <option>Female</option>
                    @endcan
                </select>
            <button>Save Changes</button>
            <button>Discard Changes</button>
            </form>
        </div>
@endsection