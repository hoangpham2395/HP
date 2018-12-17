<!DOCTYPE html>
<html lang="ja">
@include('layouts.frontend.elements.structures.head')
<body class="{{getBodyClass()}}">
<div id="Wrap">
    <div class="container">
        {!! Breadcrumbs::render() !!}
        @include('layouts.frontend.elements.messages')
        @yield('content')
        @include('layouts.frontend.elements.structures.footer')
        @include('layouts.frontend.elements.modal')
    </div>
</div>
@stack('scripts')
</body>
</html>