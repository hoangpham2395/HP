{!! MyForm::model($entity, array('class' => " modal-form main-form"))!!}
<div class="col-md-12">
    <div class="form-group">
        <i class="fa fa-asterisk"></i>
        <label>{{$entity->getAttributeName('userID')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-user"></i>
            </div>
            {!! MyForm::text('userID', $entity->userID, ['placeholder' => $entity->getAttributeName('userID'), "maxlength" => 100]) !!}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        @if(isCreate())
            <i class="fa fa-asterisk"></i>
        @endif
        <label>{{$entity->getAttributeName('userPW')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-key"></i>
            </div>
            {!! MyForm::password('userPW', ['placeholder' => $entity->getAttributeName('userPW'), "maxlength" => 100]) !!}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        @if(isCreate())
            <i class="fa fa-asterisk"></i>
        @endif
        <label>{{$entity->getAttributeName('userCPW')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-key"></i>
            </div>
            {!! MyForm::password('userCPW', ['placeholder' => $entity->getAttributeName('userCPW'), "maxlength" => 100]) !!}
        </div>
        <!-- /.input group -->
    </div>

    <div class="form-group">
        <label>{{$entity->getAttributeName('username')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-text-width"></i>
            </div>
            {!! MyForm::text('username', $entity->username, ['placeholder' => $entity->getAttributeName('username'), "maxlength" => 100]) !!}
        </div>
        <!-- /.input group -->
    </div>

    <div class="form-group">
        <label>{{$entity->getAttributeName('emailAddress')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </div>
            {!! MyForm::text('emailAddress', $entity->emailAddress, ['placeholder' => $entity->getAttributeName('emailAddress'), "maxlength" => 100]) !!}
        </div>
        <!-- /.input group -->
    </div>
    <div class="form-group">
        <label>{{$entity->getAttributeName('phoneNumber')}}</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-phone"></i>
            </div>
            {!! MyForm::text('phoneNumber', $entity->phoneNumber, ['placeholder' => $entity->getAttributeName('phoneNumber'), "maxlength" => 13]) !!}
        </div>
        <!-- /.input group -->
    </div>

</div>
{!! MyForm::close() !!}