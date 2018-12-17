@php
    $create_route = isset($create_route) ? $create_route : $routePrefix.'.create';
@endphp
<a href="javascript:void(0)" class="float-btn"
   onclick="SystemController.showModal(this, true)"
   data-url-create="{{route($controllerName.'.create')}}"
   data-href="{{backUrl($create_route)}}"
>
    <i class="fa fa-plus my-float"></i>
</a>