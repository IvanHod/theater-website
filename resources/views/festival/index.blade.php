@extends('page')
@section('body')
    <div id="festivals" class="content-path">
        <div class="body">
            @forelse($festivals as $festival)
                <div class="row">
                    <div class="col-xs-12">
                        123
                    </div>
                </div>
            @empty
                @php
                    $currentUser = \Illuminate\Support\Facades\Auth::user();
                @endphp
                @if($currentUser && $currentUser->can('create-festival'))
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <a class="btn btn-xs btn-success" href="/festival/create">Создать новый фестиваль</a>
                        </div>
                    </div>
                @endif
                <div class="h2 text-center">Фествалей еще не зарегестрировано!</div>
            @endforelse
        </div>
    </div>
@stop
