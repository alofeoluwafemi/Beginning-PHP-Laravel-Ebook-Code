<!DOCTYPE html>
<html lang="en">
@include('layout.partials._header')
<body>
<div class="d-flex" id="wrapper">
    @section('sidenav')
        @include('layout.partials._sidenav')
    @show
    <div id="page-content-wrapper">
        @section('navbar')
            @include('layout.partials._navbar')
        @show

        @yield('content')
    </div>
</div>
@include('layout.partials._footer')

@yield('styles')
</body>

</html>