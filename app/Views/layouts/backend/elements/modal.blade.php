<div class="modal" id="del-confirm" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                Are you sure to delete it?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                {!! MyForm::delete() !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! MyForm::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-main"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalCreateInformationLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="modal-label" data-model-name="{{$model->getModelName()}}" data-register-label="" data-edit-label=""></h4>
            </div>
            <div class="modal-body">
                <div id="error_msg"></div>
                <div class="row modal-form-wrap">

                </div>
                @if(\Illuminate\Support\Facades\Route::has($controllerName.'.store'))
                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button"
                            data-label-register="Register" data-label-update="Update"
                            data-url-register="{{route($controllerName.'.store')}}"
                            data-url-update="{{route($controllerName.'.update', [$model->getKeyName() => '_id_'])}}"
                            class="btn btn-primary" href="#">Update</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal" id="error-cctv-connection" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body">
                <span id="content-error-cctv-connection"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>