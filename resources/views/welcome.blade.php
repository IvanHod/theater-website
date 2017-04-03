@extends('page')
@section('body')
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center">Новости</h1>
            <table class="table">
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <td><a href="/new/{{ $new->id }}">{{ $new->name }}</a></td>
                        <td>{{ $new->description }}</td>
                        <td>{{ $new->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h1 class="text-center">Фестивали</h1>
            <table class="table">
                <tbody>
                @foreach($festivals as $festival)
                    <tr>
                        <td><a href="/festival/{{ $festival->id }}">{{ $festival->name }}</a></td>
                        <td>{{ $festival->description }}</td>
                        <td>{{ $festival->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
