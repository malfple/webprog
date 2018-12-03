@extends('layout')

@section('title', 'Post Detail')

@section('content')
    <div class="form2">
        <p style="color: red">{{$error}}</p>
        <div class="top">
        <h2>{{$owner->user_name}}</h2>
            <div class="btns">
                @if(Auth::check())
                <ul>
                    @if(!$isOwner)
                        <a href="/addToCart/{{$post->id}}">Add to Cart</a>
                    @endif
                    @can('isAdmin')
                        <a href="/deletePost/{{$post->id}}">Delete Post</a>
                    @endcan
                    @can('isNotAdmin')
                        @if($isOwner)
                            <a href="/deletePost/{{$post->id}}">Delete Post</a>
                        @endif
                    @endcan
                </ul>
                @endif
            </div>
        </div>
        <div class="img">
            <img src="/storage/{{$post->post_picture}}" alt=Anime style=100%>
            <p>{{$post->post_name}}</p>
            <p>Category: {{$category->category_name}}</p>
            <p>Caption: {{$post->post_caption}}</p>
            <p>Price: {{$post->post_price}}</p>
        </div>
        <div class="comments">
            <table>
                @foreach($comments as $comment)
                <tr>
                    <td>
                        <a class="username">{{$comment->user->user_name}}: </a>
                    </td>
                    <td>
                        <p>{{$comment->content}}</p>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @if(Auth::check())
        <div class="inputComment">
            <p>Add Your Comment:</p>
            <form id="commentForm" action="/doAddComment" method="POST">
                {{csrf_field()}}
                <textarea name="comment" form="commentForm" placeholder="Input your commet here" rows="4" cols="50"></textarea>
                <p></p>
                <input type="text" hidden=true name="post_id" value="{{$post->id}}">
                <input type="submit">
            </form>
        </div>
        @endif
    </div>
@endsection