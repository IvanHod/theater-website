@extends('page')
@section('body')
    <div id="new" class="create content-path">
        <div class="body row">
            <form enctype="multipart/form-data" action="/user{{ ($model->id ? '/' . $model->id : '') }}" method="post" class="col-xs-8 col-xs-offset-2">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label>Введите наименование:</label>
                        <input type="text" name="name" class="form-control" value="{{ $model->name }}">
                    </div>
                    <div class="col-xs-4">
                        <label>Введите E-mail:</label>
                        <input type="email" name="email" class="form-control" value="{{ $model->email }}">
                    </div>
                    <div class="col-xs-4">
                        <label>Выберете роль:</label>
                        <select name="role" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $model->hasRole($role->name) ? "selected" : "" }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <label>Введите пароль:</label>
                        <input name="password" type="password" class="form-control" value="">
                    </div>
                    <div class="col-xs-6">
                        <label>Подтвердите пароль:</label>
                        <input name="confirm_password" type="password" class="form-control" value="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-2 col-xs-offset-8">
                        <a class="btn btn-danger btn-block" href="/user{{ '/' . $model->id }}">Отмена</a>
                    </div>
                    <div class="col-xs-2">
                        <input type="submit" class="btn btn-success btn-block" value="Сохранить">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop