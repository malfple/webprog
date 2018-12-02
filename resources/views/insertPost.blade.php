@extends('layout')

@section('title', 'Insert Post')

@section('content')
    <div class="register-page">
            <div class="form">
                <h2>Insert Post</h2>
                
                <form class="register-form">
                    <input type="text" placeholder="Title"/>
                    <input type="text" placeholder="Caption Here"/>
                    <input type="file"/>
                    <select name="gender">
                        <option disabled="disabled" selected="selected">Choose Categories</option>
                        <option>Category 1</option>
                        <option>Category 2</option>
                    </select>
                <button>Save Changes</button>
                </form>
            </div>
@endsection