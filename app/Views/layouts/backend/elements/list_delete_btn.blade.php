<div class="btn-group btn-group-custom">
    <button type="button" class="btn btn-primary">Action</button>
    <button type="button" class="btn btn-primary dropdown-toggle"
            data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="javascript:void(0)"   onclick="SystemController.showModal(this, false)"
               data-url-edit="{{route($routePrefix.'.edit', ['id' => $entity->getKey()])}}"
               data-id="{{$entity->getKey()}}"
            >
                <i class="fa fa-edit text-info"></i>
                Edit
            </a>
        </li>
        @if($routePrefix != 'admin')
        <li>
            <a class="delete-action" href="#del-confirm" data-toggle="modal"
               data-action="{{backUrl($routePrefix.'.destroy',$entity->getKey())}}">
                <i class="fa fa-remove text-red"></i>
                {{trans('actions.destroy')}}
            </a>
        </li>
        @elseif(!$entity->isOwner())
            <li>
                <a class="delete-action" href="#del-confirm" data-toggle="modal"
                   data-action="{{backUrl($routePrefix.'.destroy',$entity->getKey())}}">
                    <i class="fa fa-remove text-red"></i>
                    {{trans('actions.destroy')}}
                </a>
            </li>
        @endif
    </ul>
</div>