<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <div class="btn-group">
                        <a class="btn btn-primary menu-tools" data-action="expand-all"><i class="fa fa-plus-square-o"></i>&nbsp;Expand</a>
                        <a class="btn btn-primary menu-tools" data-action="collapse-all"><i class="fa fa-minus-square-o"></i>&nbsp;Collapse</a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-info menu-save"><i class="fa fa-save"></i>&nbsp;Save</a>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <div class="dd" id="nestable">
                        <?php $MenuPresenter = app('Ilongx\Presenters\MenuPresenter'); ?>
                        <?php echo $MenuPresenter->showTree($list); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">New</h3>
                    <div class="box-tools pull-right">
                    </div><!-- /.box-tools -->
                </div>
                <form class="form-horizontal" action="<?php echo e(route('admin.menu.store')); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="parent_id" class="col-sm-2 control-label">上级菜单</label>
                            <div class="col-sm-6">
                                <select class="form-control parent_id select2-hidden-accessible" style="width: 100%;" name="parent_id" tabindex="-1" aria-hidden="true">
                                    <?php $MenuPresenter = app('Ilongx\Presenters\MenuPresenter'); ?>
                                    <?php echo $MenuPresenter->showTreeSelect($list); ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="menu_name" class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-6">
                                <div class="input-group <?php if($errors->has('menu_name')): ?> has-error <?php endif; ?>">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="menu_name" name="menu_name" value="<?php echo e(old('menu_name')); ?>" class="form-control" placeholder="请输入名称" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-sm-2 control-label">Icon</label>
                            <div class="col-sm-6">
                                <div class="input-group iconpicker-container">
                                    <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                                    <input type="text" name="icon" value="fa-bars" class="form-control icon iconpicker-element iconpicker-input" placeholder="Input Icon">
                                </div>
                                <span class="help-block">
                                    <i class="fa fa-info-circle"></i>&nbsp;For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uri" class="col-sm-2 control-label">URI</label>
                            <div class="col-sm-6">
                                <div class="input-group <?php if($errors->has('uri')): ?> has-error <?php endif; ?>">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="text" id="uri" name="uri" value="<?php echo e(old('uri')); ?>" class="form-control" placeholder="请输入URI" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="permissions" class="col-sm-2 control-label">权限</label>
                            <div class="col-sm-6">
                                <select class="form-control permissions select2-hidden-accessible" style="width: 100%;" name="roles[]" multiple="" tabindex="-1" aria-hidden="true">
                                    <?php $RolePresenter = app('Ilongx\Presenters\RolePresenter'); ?>
                                    <?php echo $RolePresenter->showTreeSelect($role_list); ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group pull-right">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>