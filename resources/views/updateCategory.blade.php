@extends('layout')

@section('title', 'Update Category')

@section('content')
    <h2 id="insertTitle">Update Category</h2><br>
    <form class="insertcategory">
        <input class="insertname" type="text" placeholder="ID"><br><br>
        <input class="insertname" type="text" placeholder="New Category Name"><br><br>
        <input type="submit" value="submit">
    </form>
@endsection