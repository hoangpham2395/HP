<!DOCTYPE html>
<html lang="ja">
@include('layouts.backend.elements.structures.head')
<body class="{{getBodyClass()}}">
@if(backendGuard()->check())
    @include('layouts.backend.elements.structures.sidebar')
@endif
<div id="Wrap">
    <div class="container">
        @yield('content')
        @include('layouts.backend.elements.structures.footer')
    </div>
</div>
@stack('scripts')
</body>
</html>