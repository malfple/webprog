@extends('layout')

@section('title', 'Insert Post')

@section('content')
    <div class="register-page">
            <div class="form">
                <h2>Insert Post</h2>
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