@php
    $label = transb($routePrefix.'.name');
@endphp
<span class="{{$icon}}" aria-hidden="true">{{$entity->id ? $label.'編集': $label.'登録'}}</span>