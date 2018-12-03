@extends('layout')

@section('title', 'Followed Categories')

@section('content')

    <div class="categories">
        <form>
            <table width=100%>
                <tr class="title">
                    <th colspan="2">
                        Categories
                    </th>
                </tr>
                <tr class="checkbox1">
                    <td>
                        <input type="checkbox" value="ahegao">
                    </td>
                    <td class="desc">
                        Ahegao
                    </td>
                </tr>
                <tr class="checkbox1">
                    <td>
                        <input type="checkbox" value="anime"> 
                    </td>
                    <td class="desc">
                        Anime
                    </td>
                </tr>
            </table>
            <input type="submit" value="submit">
        </form>
    </div>
@endsection