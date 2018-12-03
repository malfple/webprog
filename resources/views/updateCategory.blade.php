@extends('layout')

@section('title', 'Update Category')

@section('content')
    <h2 id="insertTitle">Update Category</h2><br>
    <form class="insertcategory" action="/doUpdateCategory" method="POST">
        {{csrf_field()}}
        <p style="color: red">{{$error}}</p>
        <input type="hidden" name="id" value="{{$category->id}}">
        <input class="insertname" type="text" placeholder="ID" disabled value="{{$category->id}}"><br><br>
        <input class="insertname" type="text" name="name" placeholder="New Category Name" value="{{$category->category_name}}"><br><br>
        <input type="submit" value="submit">
    </form>
@endsection