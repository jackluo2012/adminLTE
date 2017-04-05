@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;New</a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>角色名</th>
                            <th>备注</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $role)
                            <tr id="list_{{ $role->role_id }}">
                                <td>{{ $role->role_id }}</td>
                                <td>{{ $role->role_name }}</td>
                                <td>{{ $role->desc }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>{{ $role->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.role.edit', [$role->role_id]) }}"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:if(confirm('确定要删除？'))ajaxDeleteItem('{{ route('admin.role.destroy') }}', '{{ $role->role_id }}');"><i class="fa fa-trash"></i></a>
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