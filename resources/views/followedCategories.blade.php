@extends('layout')

@section('title', 'Followed Categories')

@section('content')

    <div class="categories">
        <table>
            <tr>
                <td>
                    <h2>Categories</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <form>
                        <input type="checkbox" value="ahegao"> Ahegao<br>
                        <input type="checkbox" value="anime"> Anime<br>
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection