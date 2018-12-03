@extends('layout')

@section('title', 'Insert Category')

@section('content')
    <h2 id="insertTitle">Insert Category</h2><br>
    <form class="insertcategory">
        <input class="insertname" type="text" placeholder="New Category Name"><br><br>
        <input type="submit" value="submit">
    </form>
@endsection