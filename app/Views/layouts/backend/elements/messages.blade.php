<div id="success_msg">
    @if(Session()->has('flash_success'))
        <div class="row">
            <div class="col-md-12">
                @php
                    $successMsg = (array)Session()->get('flash_success')
                @endphp
                <ul class="col-md-12 alert alert-success">
                    @foreach($successMsg as $msg)
                        <li>
                            <i class="fa fa-check"></i>
                            <strong>{{$msg}}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@if(!isset($show_error) || $show_error == true)
    <div id="error_msg">
        @if (!empty($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endif