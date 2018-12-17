<!DOCTYPE html>
<html lang="ja">
@include('layouts.frontend.elements.structures.head')
<body class="{{getBodyClass()}}">
<div id="Wrap">
    <div class="container">
        @yield('content')
        @include('layouts.frontend.elements.structures.footer')
    </div>
</div>
@stack('scripts')
</body>
</html>