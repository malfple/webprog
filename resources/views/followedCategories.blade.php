@extends('layout')

@section('title', 'Followed Categories')

@section('content')
    <table>
        <tr>
            <td>
                <p>Anime</p>
                <a class="btnfollow" href="#">Follow</a>
            </td>
        </tr>
        <tr>
            <td>
                <p>Ahegao</p>
                <a class="btnUnfollow" href="#">Unfollow</a>
            </td>
        </tr>
    </table>
@endsection