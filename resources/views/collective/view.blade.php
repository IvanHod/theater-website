@extends('page')
@section('body')
    <div id="new" class="view content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            <div class="row form-group">
                <div class="col-xs-6">
                    <img class="img-responsive" src="{{ $model->picture }}">
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-6">{{ $model->name }}</div>
                        <div class="col-xs-6 text-right">{{ $model->updated_at }}</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <span>Создал: {{ $model->username }}, ({{ $model->email }})</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <span>{{ $model->city }}, количество участников: {{ $model->count }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">{{ $model->description }}</div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-2 col-xs-offset-8">
                    <a class="btn btn-primary btn-block" href="/collective">Назад</a>
                </div>
                @php
                    $currentUser = \Illuminate\Support\Facades\Auth::user();
                @endphp
                @if($currentUser && $currentUser->isEditCollective($model->id))
                    <div class="col-xs-2">
                        <a class="btn btn-success btn-block" href="/collective/edit/{{ $model->id }}">Редактировать</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
