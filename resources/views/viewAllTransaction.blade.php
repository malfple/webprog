@extends('layout')

@section('title', 'View All Transaction History')

@section('content')
    <div class="transactionDetail">
        <p>Transaction ID: </p>
        <p>Buyer: </p>
        <p>Total Price: </p>
        <p>Transaction Date: </p>
    </div>
    <table width=100%>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><img src="ahegao.jpg" alt="Anime" style="50%"></td>
            <td>Favorite Genre</td>
            <td>10000</td>
        </tr>
    </table>
@endsection