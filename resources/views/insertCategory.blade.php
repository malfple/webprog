@extends('layout')

@section('title', 'Insert Category')

@section('content')
    <h2 id="insertTitle">Insert Category</h2><br>
    <form class="insertcategory" action="/doAddCategory" method="POST">
        {{csrf_field()}}
        <p style="color: red">{{$error}}</p>
        <input class="insertname" type="text" placeholder="New Category Name" name="name"><br><br>
        <input type="submit" value="submit">
    </form>
@endsection