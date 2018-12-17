<!DOCTYPE html>
<html lang="ja">
@include('layouts.backend.elements.structures.head')
<body class="skin-red sidebar-mini sidebar-collapse {{getBodyClass()}}">
<div class="wrapper">
    @if(backendGuard()->check())
        @include('layouts.backend.elements.structures.sidebar')
    @endif
    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{$h1}}</h1>
            {!! Breadcrumbs::render() !!}
        </section>
        <div class="col-12">
            <div class="col-md-12">
                @include('layouts.backend.elements.messages')
            </div>
        </div>
        @yield('content')
    </div>
    @include('layouts.backend.elements.structures.footer')
    @include('layouts.backend.elements.modal')
</div>
</div>
@stack('scripts')
</body>
</html>