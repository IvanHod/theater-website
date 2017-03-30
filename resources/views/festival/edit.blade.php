@extends('page')
@section('body')
    <div id="new" class="create content-path">
        <div class="body row">
            <form enctype="multipart/form-data" action="/festival{{ ($festival->id ? '/' . $festival->id : '') }}" method="post" class="col-xs-8 col-xs-offset-2">
                {{ csrf_field() }}
                @php
                    $isFileExist = $festival->picture ? true : false;
                @endphp
                <div class="row">
                    @if($isFileExist)
                        <div class="col-xs-4">
                            <img class="img-responsive" src="{{ $festival->picture }}">
                        </div>
                    @endif
                    <div class="col-xs-{{ $isFileExist ? '8' : '12' }}">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Введите наименование:</label>
                                <input type="text" name="name" class="form-control" value="{{ $festival->name }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Выберете изображение:</label>
                                <input type="file" name="pictureFile" class="form-control">
                                <input type="hidden" name="picture" value="{{ $festival->picture }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label>Город:</label>
                        <input name="city" type="text" class="form-control" value="{{ $festival->city }}">
                    </div>
                    <div class="col-xs-4">
                        <label>Дата начала:</label>
                        <input name="date_begin" type="date" class="form-control" value="{{ $festival->date_begin }}">
                    </div>
                    <div class="col-xs-4">
                        <label>Дата окончания:</label>
                        <input name="date_end" type="date" class="form-control" value="{{ $festival->date_end }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Введите описание:</label>
                        <textarea class="form-control" rows="5" name="description">{{ $festival->description }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-2 col-xs-offset-8">
                        <a class="btn btn-danger btn-block" href="/new{{ '/' . $festival->id }}">Отмена</a>
                    </div>
                    <div class="col-xs-2">
                        <input type="submit" class="btn btn-success btn-block" value="Сохранить">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop