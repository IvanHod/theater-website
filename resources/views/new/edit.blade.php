@extends('page')
@section('body')
    <div id="new" class="create content-path">
        <div class="body row">
            <form enctype="multipart/form-data" action="/new{{ '/' . $newModel->id }}" method="post" class="col-xs-8 col-xs-offset-2">
                {{ csrf_field() }}
                @php
                    $isFileExist = $newModel->picture ? true : false;
                @endphp
                <div class="row">
                    @if($isFileExist)
                        <div class="col-xs-4">
                            <img class="img-responsive" src="{{ $newModel->picture }}">
                        </div>
                    @endif
                    <div class="col-xs-{{ $isFileExist ? '8' : '12' }}">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Введите наименование:</label>
                                <input type="text" name="name" class="form-control" value="{{ $newModel->name }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Выберете изображение:</label>
                                <input type="file" name="pictureFile" class="form-control">
                                <input type="hidden" name="picture" value="{{ $newModel->picture }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label>Введите описание:</label>
                        <textarea class="form-control" rows="5" name="description">{{ $newModel->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-8">
                        <a class="btn btn-danger btn-block" href="/new{{ '/' . $newModel->id }}">Отмена</a>
                    </div>
                    <div class="col-xs-2">
                        <input type="submit" class="btn btn-success btn-block" value="Сохранить">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
