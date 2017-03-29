<!DOCTYPE html>
<html>
<head>
    @include('include/head')
</head>
<body>
<div class="container">
    <section>
        @include('include/header')
        @include('include/menu')
        @yield('body')
    </section>
    @include('include/footer')
</div>
</body>
</html>