@extends('layout')

@section('title', 'Insert Post')

@section('content')
    <div class="register-page">
            <div class="form">
                <h2>Insert Post</h2>
                <p style="color: red">{{$error}}</p>
                
                <form class="register-form" action="/doInsertPost" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" placeholder="Title" name="title">
                    <input type="text" placeholder="Caption Here" name="caption">
                    <input type="file" name="picture">
                    <input type="text" placeholder="Price" name="price">
                    <select name="category">
                        <option disabled="disabled" selected="selected">Choose Categories</option>
                        @foreach($categories as $i => $ctg)
                            <option value="{{$i+1}}">{{$ctg->category_name}}</option>
                        @endforeach
                    </select>
                <button>Save Changes</button>
                </form>
            </div>
@endsection