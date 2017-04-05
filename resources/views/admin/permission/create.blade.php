@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="{{ route('admin.permission.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;&nbsp;List</a>
                    </div>
                </div>
                <form class="form-horizontal" action="{{ route('admin.permission.store') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="permission_name" class="col-sm-2 control-label">权限名称</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('permission_name')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="permission_name" name="permission_name" value="{{ old('permission_name') }}" class="form-control" placeholder="请输入权限名称" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location" class="col-sm-2 control-label">权限标识</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('location')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="location" name="location" value="{{ old('location') }}" class="form-control" placeholder="请输入权限标识" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="route" class="col-sm-2 control-label">路由</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('route')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="route" name="route" value="{{ old('route') }}" class="form-control" placeholder="请输入路由" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group pull-right">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>
                            <div class="btn-group pull-left">
                                <input type="reset" class="btn btn-warning" value="Reset">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop