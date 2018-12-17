@extends('layouts.backend.layouts.main')
@section('content')
    <div class="col-12">
        <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Search Condition</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! MyForm::Query() !!}
                <div class="box-body">
                    <div class="form-group">
                        <label>{{$model->tA('email')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-open-o"></i>
                            </div>
                            {!! MyForm::text('email_cons', '', ['placeholder'=> $model->tA('email')]) !!}
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>{{$model->tA('role_type')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            {!! MyForm::text('role_type_cons', '', ['placeholder'=> $model->tA('role_type')]) !!}
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    @include('layouts.backend.elements.search_form_btn')
                </div>
                <!-- /.box-footer -->
                {!! MyForm::close() !!}
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">User list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-body">
                        <table class="table table-bordered dataTable">
                            <thead>
                                <th class="text-center" width="100">{{$model->tA('id')}}</th>
                                <th class="text-center">{{$model->tA('employee_id')}}</th>
                                <th class="text-center">{{$model->tA('email')}}</th>
                                <th class="text-center">{{$model->tA('role_type')}}</th>
                                <th class="text-center" width="120">Action</th>
                            </thead>
                            <tbody>
                            @foreach($entities as $entity)
                                <tr>
                                    <td class="text-center">{{$entity->getKey()}}</td>
                                    <td class="text-center">{{$entity->employee_id}}</td>
                                    <td class="text-center">{{$entity->email}}</td>
                                    <td class="text-center">{{$entity->role_type}}</td>
                                    <td class="text-center">
                                        @include('layouts.backend.elements.list_delete_btn')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center pd-10">
                            @include('layouts.backend.elements.no_result_found')
                        </div>
                        <div class="row dataTables_wrapper">
                            <div class="col-sm-5">
                                @include('layouts.backend.elements.pagination_info')
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    {{ $entities->appends(Input::all())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
    </div>
@endsection