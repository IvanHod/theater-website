@extends('page')
@section('body')
    <div id="new" class="create content-path">
        <div class="body row">
            <form enctype="multipart/form-data" action="/collective{{ ($model->id ? '/' . $model->id : '') }}" method="post" class="col-xs-8 col-xs-offset-2">
                {{ csrf_field() }}
                @php
                    $isFileExist = $model->picture ? true : false;
                @endphp
                <div class="row">
                    @if($isFileExist)
                        <div class="col-xs-4">
                            <img class="img-responsive" src="{{ $model->picture }}">
                        </div>
                    @endif
                    <div class="col-xs-{{ $isFileExist ? '8' : '12' }}">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Введите наименование:</label>
                                <input type="text" name="name" class="form-control" value="{{ $model->name }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Выберете изображение:</label>
                                <input type="file" name="pictureFile" class="form-control">
                                <input type="hidden" name="picture" value="{{ $model->picture }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <label>Город:</label>
                        <input name="city" type="text" class="form-control" value="{{ $model->city }}">
                    </div>
                    <div class="col-xs-6">
                        <label>Количество участников:</label>
                        <input name="count" type="text" class="form-control" value="{{ $model->count }}">
                    </div>
                </div>
                @if(!\Illuminate\Support\Facades\Auth::user())
                    <div class="row form-group">
                        <div class="col-xs-6">
                            <label>Ваше имя:</label>
                            <input name="username" type="text" class="form-control" value="{{ $model->username }}">
                        </div>
                        <div class="col-xs-6">
                            <label>E-mail:</label>
                            <input name="email" type="text" class="form-control" value="{{ $model->email }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-6">
                            <label>Пароль:</label>
                            <input name="password" type="text" class="form-control" value="">
                        </div>
                        <div class="col-xs-6">
                            <label>Подтвердите пароль:</label>
                            <input name="confirm_password" type="text" class="form-control" value="">
                        </div>
                    </div>
                @endif
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Описание:</label>
                        <textarea name="description" class="form-control">{{ $model->description }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-2 col-xs-offset-8">
                        <a class="btn btn-danger btn-block" href="/new{{ '/' . $model->id }}">Отмена</a>
                    </div>
                    <div class="col-xs-2">
                        <input type="submit" class="btn btn-success btn-block" value="Сохранить">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop