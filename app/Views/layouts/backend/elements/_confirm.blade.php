@php
    $label = transb($routePrefix.'.name');
    $show = isset($show) ? $show : $area.'.'.$controllerName.'._show';
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><span class="{{$icon}}"
                                             aria-hidden="true">{{$entity->id ? $label.'編集（確認）': $label.'登録（確認）'}}</span>
            </div>
            <div class="panel-body sp-padb15">
                @include('layouts.backend.elements.confirm_text_danger')
                @include($show)
                @include('layouts.backend.elements.confirm')
            </div>
        </div>
    </div>
</div>