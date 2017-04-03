@extends('page')
@section('body')
    @php
        $currentUser = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <div id="users" class="content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            @if($currentUser && $currentUser->can('create-user'))
                <div class="row form-group">
                    <div class="col-xs-12 text-right">
                        <a class="btn btn-xs btn-success" href="/user/edit">Создать нового пользователя</a>
                    </div>
                </div>
            @endif
            @forelse($models as $model)
                <div class="row form-group line-entity">
                    <div class="col-xs-4">
                        <a href="/user/{{ $model->id }}">
                            <b>{{ $model->name }}</b>
                        </a>
                        @if($currentUser && $currentUser->can('delete-user'))
                            {{csrf_field()}}
                            <a class="text-danger h6 delete" data-id="{{ $model->id }}" href="#">(удалить)</a>
                        @endif
                    </div>
                    <div class="col-xs-2">
                        {{ $model->email }}
                    </div>
                    <div class="col-xs-3">
                        @foreach($model->roles as $role)
                            {{ $role->display_name }},
                        @endforeach
                    </div>
                    <div class="col-xs-3 text-right">{{ $model->updated_at }}</div>
                </div>
            @empty
                <div class="h2 text-center">Пользователей еще не зарегестрировано!</div>
            @endforelse
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete').click(function (e) {
                var token = $('[name="_token"]');
                $.ajax({
                    url: '/user/' + $(this).data('id'),
                    type: 'delete',
                    data: {'_token': $(token).val()},
                    success: function () {
                        location.href = '/user/';
                    }
                });
                e.preventDefault();
                return false;
            })
        })
    </script>
@stop
