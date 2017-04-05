@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="{{ route('admin.role.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;&nbsp;List</a>
                    </div>
                </div>
                <form class="form-horizontal" action="{{ route('admin.role.store') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="role_name" class="col-sm-2 control-label">角色名</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('role_name')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="role_name" name="role_name" value="{{ old('role_name') }}" class="form-control" placeholder="请输入角色名" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="permissions" class="col-sm-2 control-label">权限</label>
                            <div class="col-sm-6">
                                <select class="form-control permissions select2-hidden-accessible" style="width: 100%;" name="permissions[]" multiple="" tabindex="-1" aria-hidden="true">
                                    @inject('MenuPresenter', 'Ilongx\Presenters\MenuPresenter')
                                    {!! $MenuPresenter->showTreeSelect($menu_list) !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-6">
                                <div class="text-group @if($errors->has('desc')) has-error @endif">
                                    <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="请输入备注">{{ old('desc') }}</textarea>
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