<div class="row text-center" id="general-menu">
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
        $isAdmin = $user && $user->can('show-user');
    @endphp
    <div class="col-xs-2 {{$isAdmin ? '' : 'col-xs-offset-1'}}"><a href="/">Главная</a></div>
    <div class="col-xs-2"><a href="/festival/">Фестивали</a></div>
    <div class="col-xs-2"><a href="/collective/">Колективы</a></div>
    <div class="col-xs-2"><a href="/new/">Новости сайта</a></div>
    <div class="col-xs-2"><a href="/about-us/">О нас</a></div>
    @if($isAdmin)
        <div class="col-xs-2"><a href="/user/">Пользователи</a></div>
    @endif
</div>