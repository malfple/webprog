@extends('layout')

@section('title', 'Manage Categories')

@section('content')
    <div class="managecategory">
        <form id="managecategories">
            <table width=100%>
                <tr>
                    <p class="categorytitle">Category</p>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Auth</th>

                </tr>
                <tr>
                    <td>1</td>
                    <td>admin</td>
                    <td>
                        <input type="image" alt="update" src="/updateLogo.png" style=10%>
                        <input type="image" alt="delete" src="/deleteLogo.png" style=10%>
                    </td>
                </tr>
            </table>
            <button>Add</button>
        </form>
    </div>
@endsection