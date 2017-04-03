@extends('page')
@section('body')
    @php
        $currentUser = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <div id="collectives" class="content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            <div class="row form-group">
                <div class="col-xs-12 text-right">
                    <a class="btn btn-xs btn-success" href="/collective/edit">Создать новый коллектив</a>
                </div>
            </div>
            @forelse($models as $model)
                    <div class="row form-group">
                        <div class="col-xs-3">
                            <img class="img-responsive" src="{{$model->picture}}">
                        </div>
                        <div class="col-xs-9">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="/collective/{{ $model->id }}">
                                        <b>{{ $model->name }}</b>
                                    </a>
                                    @if($currentUser && $currentUser->isEditCollective($model->id))
                                        {{csrf_field()}}
                                        <a class="text-danger h6 delete" data-id="{{ $model->id }}" href="#">(удалить)</a>
                                    @endif
                                </div>
                                <div class="col-xs-6 text-right">{{ $model->updated_at }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <small>{{ $model->city }}, состав: {{ $model->count }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"><p>{{ $model->description }}</p></div>
                            </div>
                        </div>
                    </div>
            @empty
                <div class="h2 text-center">Коллективов еще не зарегестрировано!</div>
            @endforelse
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete').click(function (e) {
                var token = $('[name="_token"]');
                $.ajax({
                    url: '/collective/' + $(this).data('id'),
                    type: 'delete',
                    data: {'_token': $(token).val()},
                    success: function () {
                        location.href = 'collective';
                    }
                });
                e.preventDefault();
                return false;
            })
        })
    </script>
@stop
