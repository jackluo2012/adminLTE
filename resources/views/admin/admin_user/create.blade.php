@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="{{ route('admin.adminUser.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;&nbsp;List</a>
                    </div>
                </div>
                <form class="form-horizontal" action="{{ route('admin.adminUser.store') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('username')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control" placeholder="Input Username" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('password')) has-error @endif">
                                    <div class="input-group-addon">
                                        <i class="fa fa-eye-slash"></i>
                                    </div>
                                    <input type="password" id="password" name="password" value="" class="form-control" placeholder="Input Password" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="permissions" class="col-sm-2 control-label">权限</label>
                            <div class="col-sm-6">
                                <select class="form-control permissions select2-hidden-accessible" style="width: 100%;" name="roles[]" multiple="" tabindex="-1" aria-hidden="true">
                                    @inject('RolePresenter', 'Ilongx\Presenters\RolePresenter')
                                    {!! $RolePresenter->showTreeSelect($role_list) !!}
                                </select>
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