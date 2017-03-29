<div class="row" id="header">
    <div class="col-xs-3 text-center">
        <img src="/img/logo.png" class="img-responsive">
    </div>
    <div class="col-xs-5 text-center">
        <h1 class="text-primary"><b>Театр - наше всё!!!</b></h1>
        <p class="text-left"><i>В театре на постоянную должность может рассчитывать лишь один человек
                - ночной сторож.
            <span class="pull-right"><b>Таллула Банкхед.</b></span></i></p>
    </div>
    <div class="col-xs-4 text-right">
        @if (Auth::check())
            <span>Добро пожаловать, {{Auth::user()->name}}</span>
            (<a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();"><u>Выйти</u></a>)

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @else
            <form action="/login" method="post">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-xs-5">
                        <input class="form-control" placeholder="Введите email..." name="email">
                    </div>
                    <div class="col-xs-5">
                        <input class="form-control" placeholder="Введите пароль..." name="password">
                    </div>
                    <div class="col-xs-2">
                        <input class="btn btn-success" type="submit" value="Войти">
                    </div>
                </div>
            </form>
        @endif

        <div class="row">
            <div class="col-xs-12 text-right">
                <span class="h4">+7 (902) 709-56-65</span>
            </div>
        </div>
    </div>
</div>