@extends('page')
@section('body')
    @php
        $currentUser = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <div id="festivals" class="content-path row">
        <div class="body col-xs-10 col-xs-offset-1">
            @if($currentUser && $currentUser->can('create-festival'))
                <div class="row form-group">
                    <div class="col-xs-12 text-right">
                        <a class="btn btn-xs btn-success" href="/festival/edit">Создать новый фестиваль</a>
                    </div>
                </div>
            @endif
            @forelse($festivals as $festival)
                    <div class="row form-group">
                        <div class="col-xs-3">
                            <img class="img-responsive" src="{{$festival->picture}}">
                        </div>
                        <div class="col-xs-9">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="/festival/{{ $festival->id }}">
                                        <b>{{ $festival->name }}</b>
                                    </a>
                                    @if($currentUser && $currentUser->can('create-new'))
                                        {{csrf_field()}}
                                        <a class="text-danger h6 delete" data-id="{{ $festival->id }}" href="#">(удалить)</a>
                                    @endif
                                </div>
                                <div class="col-xs-6 text-right">{{ $festival->updated_at }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <small>{{ $festival->city }}: {{ $festival->date_begin }} - {{ $festival->date_end }}</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"><p>{{ $festival->description }}</p></div>
                            </div>
                        </div>
                    </div>
            @empty
                <div class="h2 text-center">Фествалей еще не зарегестрировано!</div>
            @endforelse
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete').click(function (e) {
                var token = $('[name="_token"]');
                $.ajax({
                    url: '/festival/' + $(this).data('id'),
                    type: 'delete',
                    data: {'_token': $(token).val()},
                    success: function () {
                        location.href = 'festival';
                    }
                });
                e.preventDefault();
                return false;
            })
        })
    </script>
@stop
