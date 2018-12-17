<!DOCTYPE html>
<html lang="ja">
@include('layouts.frontend.elements.structures.head')
<body class="{{getBodyClass()}}">
<div id="Wrap">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('layouts.frontend.elements.structures.footer_js')
@stack('scripts')
</body>
</html>