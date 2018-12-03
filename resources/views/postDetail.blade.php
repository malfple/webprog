@extends('layout')

@section('title', 'Post Detail')

@section('content')
    <div class="form2">
        <div class="top">
        <h2>User</h2>
            <div class="btns">
                <ul>
                    <a href="#">Add to Cart</a>
                    <a href="#">Delete Post</a>
                </ul>
            </div>
        </div>
        <div class="img">
            <img src="/ahegao.jpg" alt=Anime style=100%>
            <p>Ahegao Face</p>
        </div>
        <div class="comments">
            <table>
                <tr>
                    <td>
                        <a class="username">Loli Heaven: </a>
                    </td>
                    <td>
                        <p>This post is sick bro</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="inputComment">
            <p>Add Your Comment:</p>
            <form id="commentForm">
                <textarea name="comment" form="commentForm" placeholder="Input your commet here" rows="4" cols="50"></textarea>
                <p></p>
                <input type="submit">
            </form>
        </div>
    </div>
@endsection