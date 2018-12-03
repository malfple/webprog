@extends('layout')

@section('title', 'Transaction History')

@section('content')
    @foreach($transactions as $transaction)
    <div class="transactionDetail">
        <p>Transaction ID: {{$transaction->id}}</p>
        <p>Total Price: {{$transaction->total_price}}</p>
        <p>Transaction Date: {{$transaction->transaction_date}}</p>
    </div>
    <table width=100%>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        @foreach($transaction->posts as $post)
        <tr>
            <td><a href="/postDetail/{{$post->id}}"><img src="/storage/{{$post->post_picture}}" alt="Anime" style="50%"></a></td>
            <td>{{$post->post_name}}</td>
            <td>{{$post->post_price}}</td>
        </tr>
        @endforeach
    </table>
    @endforeach
@endsection