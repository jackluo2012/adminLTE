<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="<?php echo e(route('admin.permission.create')); ?>" class="btn btn-sm btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;New</a>
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
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr id="list_<?php echo e($permission->permission_id); ?>">
                                <td><?php echo e($permission->permission_id); ?></td>
                                <td><?php echo e($permission->permission_name); ?></td>
                                <td><?php echo e($permission->route); ?></td>
                                <td><?php echo e($permission->status); ?></td>
                                <td><?php echo e($permission->created_at); ?></td>
                                <td><?php echo e($permission->updated_at); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.permission.edit', [$permission->permission_id])); ?>"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:if(confirm('确定要删除？'))ajaxDeleteItem('<?php echo e(route('admin.permission.destroy')); ?>', '<?php echo e($permission->permission_id); ?>');"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <?php echo $list->render(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>