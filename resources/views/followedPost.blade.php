@extends('layout')

@section('title', 'Followed Categories')

@section('content')
<div class="imgrow">
    @foreach($posts as $post)
        <div class="imgcol">
            <a href="/postDetail/{{$post->id}}">
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