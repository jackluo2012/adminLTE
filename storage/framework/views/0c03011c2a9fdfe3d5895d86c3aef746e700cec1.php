<?php if(trans('admin/route_title.'.Route::currentRouteName().'.title') != 'admin/route_title.'.Route::currentRouteName().'.title'): ?>
<section class="content-header">
    <h1>
        <?php if(trans('admin/route_title.'.Route::currentRouteName().'.title') != 'admin/route_title.'.Route::currentRouteName().'.title'): ?><?php echo e(trans('admin/route_title.'.Route::currentRouteName().'.title')); ?><?php endif; ?>
        <?php if(trans('admin/route_title.'.Route::currentRouteName().'.desc') != 'admin/route_title.'.Route::currentRouteName().'.desc'): ?><small><?php echo e(trans('admin/route_title.'.Route::currentRouteName().'.desc')); ?></small><?php endif; ?>
    </h1>
    
        
        
    
</section>
<?php endif; ?>