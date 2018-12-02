@extends('layout')

@section('title', 'My Post')

@section('content')
    <div class="add">
        <a href="/addPost">+ Add</a>
    </div>

<div class="imgrow">
    @foreach($posts as $post)
        <div class="imgcol">
            <a href="#">
                <center>
                    <img src="/storage/{{$post->post_picture}}"><br>
                    {{$post->post_name}}<br>
                    {{$post->post_caption}}<br>
                    {{$post->post_price}}
                </center>
            </a>
        </div>
    @endforeach
    {{$posts->links()}}
</div>
@endsection