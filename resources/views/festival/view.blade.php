@extends('page')
@section('body')
    <div id="new" class="view content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            <div class="row form-group">
                <div class="col-xs-6">
                    <img class="img-responsive" src="{{ $festival->picture }}">
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-6">{{ $festival->name }}</div>
                        <div class="col-xs-6 text-right">{{ $festival->updated_at }}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <span>{{ $festival->city }}: {{ $festival->date_begin }} - {{ $festival->date_end }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">{{ $festival->description }}</div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-2 col-xs-offset-8">
                    <a class="btn btn-primary btn-block" href="/festival">Отмена</a>
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-success btn-block" href="/festival/edit/{{ $festival->id }}">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
