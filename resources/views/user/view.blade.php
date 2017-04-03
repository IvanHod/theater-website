@extends('page')
@section('body')
    <div id="new" class="view content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            <div class="row form-group">
                <div class="col-xs-6">{{ $model->name }}</div>
                <div class="col-xs-6 text-right">{{ $model->updated_at }}</div>
            </div>
            <div class="row form-group">
                <div class="col-xs-12">E-mail: {{ $model->email }}</div>
            </div>
            <div class="row form-group">
                <div class="col-xs-12">
                    @foreach($model->roles as $role)
                        {{ $role->display_name }}
                    @endforeach
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-2 col-xs-offset-8">
                    <a class="btn btn-primary btn-block" href="/user">Отмена</a>
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-success btn-block" href="/user/edit/{{ $model->id }}">Редактировать</a>
                </div>
            </div>
        </div>
    </div>
@stop
