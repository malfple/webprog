@extends('layout')

@section('title', 'Profile Page')

@section('content')
    <div class="register-page">
        <div class="form">
            <div class="profile">
                <div class="profilepic">
                    <img src="img/Illya.jpg" alt="profile pic">
                </div>
                <div class="profiledetail">
                    <p>Profile Name</p>
                    <p>profile@profile.com</p>
                </div>
            </div>
                
            <form class="register-form">
                <input type="text" placeholder="UserID"/>
                <input type="text" placeholder="Name"/>
                <input type="text" placeholder="Email Address"/>
                <input type="password" placeholder="Password"/>
                <select name="gender">
                    <option disabled="disabled" selected="selected">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            <button>Save Changes</button>
            <button>Discard Changes</button>
            </form>
        </div>
@endsection