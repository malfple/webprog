@extends('layout')

@section('title', 'My Post')

@section('content')
    <div class="add">
        <a href="#">+ Add</a>
    </div>
    <div class="imgrow">
        <div class="imgcol">
            <center>
                <img src="img/kanna1.jpg" alt="kanna" style="50%">
            </center>
        </div>
        <div class="imgcol">
            <center>
                <img src="img/victorique1.jpg" alt="victorique" style="50%">
            </center>
        </div>
        <div class="imgcol">
            <center>
                <img src="img/Illya.jpg" alt="Illya" style="50%">
            </center>
        </div>
    </div>
@endsection