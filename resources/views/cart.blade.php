@extends('layout')

@section('title', 'Cart')

@section('content')
    <p>Items in Cart: </p>
    <table class="cart">
        @foreach($posts as $post)
        <tr>
            <td>
                <a href="/postDetail/{{$post->id}}"><img src="/storage/{{$post->post_picture}}" alt="Picture" style=30%></a>
            </td>
            <td>
                <p>Image Title: {{$post->post_name}}</p>
                <p>Image Price: {{$post->post_price}}</p>
                <p>Image Owner: {{$post->user->user_name}}</p>
                <a href="/removeFromCart/{{$post->id}}">Remove</a>
            </td>
        </tr>
        @endforeach
    </table>
    <p>Total Price: {{$total_price}}</p>
    <form action="/checkout" method="POST">
        {{csrf_field()}}
        <button type="submit">Checkout</button>
    </form>
@endsection