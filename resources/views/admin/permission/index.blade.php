@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="{{ route('admin.permission.create') }}" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;New</a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>权限名称</th>
                            <th>路由</th>
                            <th>状态</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $permission)
                            <tr id="list_{{ $permission->permission_id }}">
                                <td>{{ $permission->permission_id }}</td>
                                <td>{{ $permission->permission_name }}</td>
                                <td>{{ $permission->route }}</td>
                                <td>{{ $permission->status }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>{{ $permission->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.permission.edit', [$permission->permission_id]) }}"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:if(confirm('确定要删除？'))ajaxDeleteItem('{{ route('admin.permission.destroy') }}', '{{ $permission->permission_id }}');"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    {!! $list->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop