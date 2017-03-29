@extends('page')
@section('body')
    @php
        $currentUser = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <div id="festivals" class="content-path row">
        <div class="body col-xs-8 col-xs-offset-2">
            @forelse($news as $new)
                <div class="row">
                    <div class="col-xs-3">
                        <img class="img-responsive" src="{{$new->picture}}">
                    </div>
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="/new/{{ $new->id }}">
                                    <b>{{ $new->name }}</b>
                                </a>
                                @if($currentUser && $currentUser->can('create-new'))
                                    {{csrf_field()}}
                                    <a class="text-danger h6 delete" data-id="{{ $new->id }}" href="#">(удалить)</a>
                                @endif
                            </div>
                            <div class="col-xs-6 text-right">{{ $new->updated_at }}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12"><p>{{ $new->description }}</p></div>
                        </div>
                    </div>
                </div>
            @empty
                @if($currentUser && $currentUser->can('create-new'))
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <a class="btn btn-xs btn-success" href="/new/edit">Создать новую новость</a>
                        </div>
                    </div>
                @endif
                <div class="h2 text-center">Новостей еще не создано!</div>
            @endforelse
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete').click(function (e) {
                var token = $('[name="_token"]');
                $.ajax({
                    url: '/new/' + $(this).data('id'),
                    type: 'delete',
                    data: {'_token': $(token).val()},
                    success: function () {
                        location.reload();
                    }
                });
                e.preventDefault();
                return false;
            })
        })
    </script>
@stop
