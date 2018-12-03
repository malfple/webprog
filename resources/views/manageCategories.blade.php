@extends('layout')

@section('title', 'Manage Categories')

@section('content')
    <div class="managecategory">
        <table width=100%>
            <tr>
                <p class="categorytitle">Category</p>
            </tr>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Auth</th>
            </tr>
            @foreach($categories as $i => $category)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$category->category_name}}</td>
                <td>
                    <a href="/updateCategory/{{$category->id}}"><button><input type="image" alt="update" src="/pencilLogo.png" style=10%></button></a>
                    <a href="/deleteCategory/{{$category->id}}"><button><input type="image" alt="delete" src="/deleteLogo.png" style=10%></button></a>
                </td>
            </tr>
            @endforeach
        </table>
        <a href="/addCategory"><button>Add</button></a>
    </div>
@endsection