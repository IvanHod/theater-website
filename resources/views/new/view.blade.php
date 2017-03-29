@extends('page')
@section('body')
    <div id="new" class="view content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            <div class="row form-group">
                <div class="col-xs-6">
                    <img class="img-responsive" src="{{ $newModel->picture }}">
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-6">{{ $newModel->name }}</div>
                        <div class="col-xs-6 text-right">{{ $newModel->updated_at }}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">{{ $newModel->description }}</div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-2 col-xs-offset-8">
                    <a class="btn btn-primary btn-block" href="/new">Отмена</a>
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-success btn-block" href="/new/edit/{{ $newModel->id }}">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
