@extends('layout')

@section('title', 'Cart')

@section('content')
    <p>Items in Cart: </p>
    <table class="cart">
        <tr>
            <td>
                <img src="/ahegao.jpg" alt="Picture" style=30%>
            </td>
            <td>
                <p>Image Title: Ahegao</p>
                <p>Image Price: 10000</p>
                <p>Image Owner: Loli Heaven</p>
                <a href="#">Remove</a>
            </td>
        </tr>
    </table>
    <p>Total Price: Rp. </p>
    <a href=#>Checkout</a>
@endsection