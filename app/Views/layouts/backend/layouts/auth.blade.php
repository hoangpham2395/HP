<!DOCTYPE html>
<html lang="ja">
@include('layouts.backend.elements.structures.head')
<body class="hold-transition login-page {{getBodyClass()}}" data-gr-c-s-loaded="true">
<div>
        @yield('content')
</div>
@include('layouts.backend.elements.structures.footer_js')
@stack('scripts')
</body>
</html>