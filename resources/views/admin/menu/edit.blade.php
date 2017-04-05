@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;&nbsp;List</a>
                    </div>
                </div>
                <form class="form-horizontal" action="{{ route('admin.menu.update') }}" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="parent_id" class="col-sm-2 control-label">上级菜单</label>
                            <div class="col-sm-6">
                                <select class="form-control parent_id select2-hidden-accessible" style="width: 100%;" name="parent_id" tabindex="-1" aria-hidden="true">
                                    @inject('MenuPresenter', 'Ilongx\Presenters\MenuPresenter')
                                    {!! $MenuPresenter->showTreeSelect($list, $menu->parent_id) !!}
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="menu_name" class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('menu_name')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="menu_name" name="menu_name" value="{{ old('menu_name', $menu->menu_name) }}" class="form-control" placeholder="请输入名称" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-sm-2 control-label">Icon</label>
                            <div class="col-sm-6">
                                <div class="input-group iconpicker-container">
                                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                                    <input type="text" name="icon" value="{{ $menu->icon }}" class="form-control icon iconpicker-element iconpicker-input" placeholder="Input Icon">
                                </div>
                                <span class="help-block">
                                    <i class="fa fa-info-circle"></i>&nbsp;For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uri" class="col-sm-2 control-label">URI</label>
                            <div class="col-sm-6">
                                <div class="input-group @if($errors->has('uri')) has-error @endif">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="uri" name="uri" value="{{ old('uri', $menu->uri) }}" class="form-control" placeholder="请输入URI" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  for="uri" class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-6">
                                <div class="input-group radio-inline">
                                    <label class="radio-inline">
                                        <input type="radio" name="show"  value="1" @if(old('uri', $menu->show)==1) checked @endif> 显示
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="show" value="0" @if(old('uri', $menu->show)==0) checked @endif > 不显示
                                    </label>
                                </div>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="permissions" class="col-sm-2 control-label">权限</label>-->
<!--                            <div class="col-sm-6">-->
<!--                                <select class="form-control permissions select2-hidden-accessible" style="width: 100%;" name="roles[]" multiple="" tabindex="-1" aria-hidden="true">-->
<!--                                    @inject('RolePresenter', 'Ilongx\Presenters\RolePresenter')-->
<!--                                    {!! $RolePresenter->showTreeSelect($role_list, $select_role_ids) !!}-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group pull-right">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="menu_id" value="{{ $menu->menu_id }}">
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