@extends('layout')

@section('title', 'Followed Categories')

@section('content')

    <div class="categories">
        <form action="/updateFollowedCategories" method="POST">
            {{csrf_field()}}
            <table width=100%>
                <tr class="title">
                    <th colspan="2">
                        Categories
                    </th>
                </tr>
                @foreach($categories as $i => $category)
                <tr class="checkbox1">
                    <td>
                        <input type="hidden" name="{{$i}}" value="0">
                        @if($isActive[$i] == 1)
                        <input type="checkbox" name="{{$i}}" value="1" checked>
                        @else
                        <input type="checkbox" name="{{$i}}" value="1">
                        @endif
                    </td>
                    <td class="desc">
                        {{$category->category_name}}
                    </td>
                </tr>
                @endforeach
            </table>
            <input type="submit" value="submit">
        </form>
    </div>
@endsection