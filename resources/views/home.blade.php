@extends('layout')

@section('title', 'Home')

@section('content')
<div class="imgrow">
    @foreach($posts as $i => $post)
        <div class="imgcol">
            <a href="/postDetail/{{($posts->currentPage()-1) * 10 + $i+1}}">
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